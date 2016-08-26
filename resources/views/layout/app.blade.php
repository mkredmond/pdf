<!DOCTYPE html>
<html>
    <head>
        <title>
            Catalog Creator 3000
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/app.css"/>
        <link rel="stylesheet" type="text/css" href="./css/all.css"/>
        
    </head>
    <body>
        @include('partials.nav')
    
		@yield('content')
        
        <footer class="footer">
          <div class="container text-center">
            <p>St. John Fisher College  &copy; 2016</p>
          </div>
        </footer>
        <script type="text/javascript" src="./js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="./js/all.js"></script>

        @include('partials.flash')

        @yield('footer')

    </body>
</html>
