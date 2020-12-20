<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Doughy Delights</title>
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
  {{View:: make('header')}}
    @yield('content')
  {{View:: make('footer')}}
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>