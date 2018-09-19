<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>LMA | Admin</title>
  @include('backend.partials.styles')
</head>
<body>
  <div id="app">
    @yield('content')
  </div>

  @include('backend.partials.scripts')

  <script type="text/javascript">
  // Login Page Flipbox control
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });
  </script>
</body>
</html>
