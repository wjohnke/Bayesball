<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="chrome=1"> -->
    <title>jquery-confirm.js | The multipurpose alert & confirm</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">


    <script
            src="http://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script
            src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"
            integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI="
            crossorigin="anonymous"></script>


    <link rel="stylesheet"
    type="text/css"
    href="{{asset('css/jquery-confirm.css')}}"/>

    <script type="text/javascript"
    src="{{asset('js/jquery-confirm.js')}}"></script>
</head>
<body>

<main class="py-4">
    @yield('content')

</main>
@yield('script')
</body>
</html>