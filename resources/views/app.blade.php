<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UP Engineering Research and Development Foundation Inc.</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}" type="text/css">
    <script>
        window.csrf_token = "{{ csrf_token() }}";
    </script>
</head>
<body>
<div id="app"></div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
