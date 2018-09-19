<?php

namespace App\Helpers;

use Request;
use App\Setting;
use Carbon\Carbon;
use App\OrderBook;
use App\Order;
use App\Book;

class CalculationHelper
{

  public static function calculateFine($orderId)
  {
    $totalBookOfOrders = OrderBook::where('order_id', $orderId)->get();
    $order = Order::find($orderId);
    $totalFine = $order->fine;
    if(!is_null($totalBookOfOrders)){
      $settings = Setting::first();
      $maxDay = $settings->fine_day;
      $finePerDay = $settings->fine_amount;
      $previousFine = 0;

      foreach ($totalBookOfOrders as $totalBookOfOrder) {
        $previousFine = $previousFine + $totalBookOfOrder->fine;
        $orderDate = Carbon::parse($totalBookOfOrder->order_date);
        $today = Carbon::parse(Carbon::now());
        $diffInDays = $today->diffInDays($orderDate);

        if($diffInDays > $maxDay){
          $previousFine = $totalBookOfOrder->fine;
          $fineOfThisBook = $previousFine + $diffInDays * $finePerDay;
          $totalBookOfOrder->fine = $fineOfThisBook;
          $totalBookOfOrder->order_date = Carbon::now();
          $totalBookOfOrder->save();
          $totalFine = $totalFine + $diffInDays * $finePerDay;
        }
      }

      $order = Order::find($orderId);
      $order->fine = $totalFine;
      $order->save();

      return $totalFine;
    }
  }


  public static function fineForSingleBook($orderDate, $id, $orderId)
  {
    $orderDate = Carbon::parse($orderDate);
    $today = Carbon::parse(Carbon::now());
    $diffInDays = $today->diffInDays($orderDate);
    $settings = Setting::first();
    $maxDay = $settings->fine_day;
    $finePerDay = $settings->fine_amount;
    $orderBook = OrderBook::find($id);
    $totalFineOfThisBook =  $orderBook->fine;
    $order = Order::find($orderId);
    $totalFine = $order->fine;

    if($diffInDays > $maxDay){
      $totalFineOfThisBook = $totalFineOfThisBook + $diffInDays * $finePerDay;
      $orderBook->fine = $totalFineOfThisBook;
      $orderBook->order_date = Carbon::now();
      $orderBook->save();
      $totalFine = $totalFine + $diffInDays * $finePerDay;
      $order->fine = $totalFine;
      $order->save();
      return $totalFineOfThisBook;
    }
    else{
      return $totalFineOfThisBook;
    }
  }


  public static function autoOrderCancel()
  {
    $bookedOrders = OrderBook::where('order_status', 0)->get();

    if(count($bookedOrders) > 0){
      foreach($bookedOrders as $bookedOrder){
        $orderDate = Carbon::parse($bookedOrder->order_date);
        $today = Carbon::parse(Carbon::now());
        $diffInDays = $today->diffInDays($orderDate);
        if($diffInDays > 0){
          $orderCount = Order::where('id', $bookedOrder->order_id)->get();
          if(count($orderCount) < 1){
            $orderCount->delete();
          }
          $book = Book::find($bookedOrder->book_id);
          $book->quantity = $book->quantity + 1;
          $book->save();
          $bookedOrder->delete();
        }
      }
    }
  }
}
