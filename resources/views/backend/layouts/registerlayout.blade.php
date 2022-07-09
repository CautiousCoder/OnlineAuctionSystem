<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('signintitle')</title>

 {{-- Style link here --}}
 @include('backend.layouts.inc.style')
</head>
<body class="hold-transition register-page login-page">
<div class="mt-4">
  @yield('signinpage')
</div>
 <!-- script link -->
 @include('backend.layouts.inc.scripts')
</body>
</html>