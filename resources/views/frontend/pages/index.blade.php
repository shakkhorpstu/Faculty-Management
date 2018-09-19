@extends('frontend.layouts.master')

@section('content')
  <div class="slider-dean-message">
    <div class="row">
      <div class="col-md-12">
        <div class="sliderPart">
          <div id="carouselExampleIndicators" data-ride="carousel" id="carousel-fade" class="carousel fadeIn" data-interval="5000">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 " src="{!! asset('public/images/slider/slide4.jpg') !!}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="text-center wow bounceInLeft">The Largest University in the southern part of Bangladesh</h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{!! asset('public/images/slider/slide1.jpg') !!}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="text-center wow bounceInRight">There are 7 Faculties and 53 Departments In Our University</h2>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{!! asset('public/images/slider/slide3.jpg') !!}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h2 class="text-center wow bounceInRight">The Leading Technology University in Bangladesh from 2000</h2>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div> <!-- End slider and dean message -->

  <div class="message_from_dean">

    <div class="row">
      <div class="col-md-4">

        <img class="d-block w-100" src="{!! asset('public/images/deans/'.$dean->image) !!}">
        <b><center>{{ $dean->first_name.' '.$dean->last_name }}</center></b>

      </div>

      <div class="col-md-8">
        <h2 >Message From Dean</h2>
        <div>
          {{ $dean->message }}
        </div>
      </div>
    </div>
  </div>



  <div class="news-notice">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class=" news-single">
            <h2>Latest News</h2>
            <ul>
              @foreach($newss as $news)
                <li><a href="">{{ $news->title }}</a></li>
              @endforeach
            </ul>
            <a href="{{ route('allNews') }}" class="btn btn-outline-primary float-right">Read More News</a>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class=" news-single">
            <h2>Latest Notices</h2>
            <ul>
              @foreach($notices as $notice)
                <li><a href="">{{ $notice->title }}</a></li>
              @endforeach
            </ul>
            <a href="{{ route('allNotice') }}" class="btn btn-outline-warning float-right">Read More Notices</a>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End News and Notice Div -->

  <!-- Main Links -->
  <div class="main-links">
    <div class="container">
      <h2>All Important Links</h2>
      <div class="row">

        <div class="col-sm-4">
          <div class="card single-link" onclick="location.href='{!! route('allEvent') !!}'">
            <img class="card-img-top" src="{!! asset('public/images/defaults/events.jpeg') !!}">
            <div class="card-body">
              <h4 class="card-title">Events</h4>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card single-link" onclick="location.href='{!! route('academic.activities') !!}'">
            <img class="card-img-top" src="{!! asset('public/images/defaults/activities.jpeg') !!}">
            <div class="card-body">
              <h4 class="card-title">Activities</h4>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card single-link" onclick="location.href='{!! route('academic.scholarship') !!}'">
            <img class="card-img-top" src="{!! asset('public/images/defaults/scholarship.jpeg') !!}">
            <div class="card-body">
              <h4 class="card-title">Scholarship</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
