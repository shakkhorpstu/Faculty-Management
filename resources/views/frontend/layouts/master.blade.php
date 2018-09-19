<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Land Management | PSTU</title>

  @include('frontend.partials.styles')

  @section('styles')
  @show

</head>

<body>

  <div id="app">

    @include('frontend.partials.nav')

    <div class="all-contents">

      @section('content')
      @show

      @include('frontend.partials.footer')

    </div>

  </div>

    @include('frontend.partials.scripts')

</body>
</html>
