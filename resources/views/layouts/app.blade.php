<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="{{URL::to('/css/style.css')}}">
    </head>
    
    <body>
        @include('includes.header')
       <div class="container">@yield('contents')</div>

       <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
       <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="{{URL::to('/js/style.js')}}"></script>
       <!-- Latest compiled and minified JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
