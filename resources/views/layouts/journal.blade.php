<!DOCTYPE html>
<html>
    @section('head')
        <head>
            <title>Журнал</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="{{asset("js/main.js")}}"></script>
        </head>
    @show
    <body>
        @section('content')
        <div class="content" style="display:flex;flex-direction:row;justify-content:flex-start;padding:20px;">
            <div id="yesterday" style="float: left; width: 50%; border:5px solid black;padding:20px;">
                 @yield('yesterday')
            </div>
            
            <div id="today" style="float: left; width: 50%; border:5px solid black;padding:20px;">
                @yield('today')
            </div>
            
        </div>
        <div class="content" style="display:flex;flex-direction:row;justify-content:flex-start;padding:20px;">
            <div id="plans" style="float: left; width: 100%; border:5px solid black;padding:20px;">
                @yield('plans')
            </div>
        </div>
        @show
        
    </body>
</html>

