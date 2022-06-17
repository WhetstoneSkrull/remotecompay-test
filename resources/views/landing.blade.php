<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <meta name="description" content="ERP Test" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <title>The Remote Company - Test</title>
        <link href=" {{ ('css/app.css') }}" rel="stylesheet">
        <link href=" {{ ('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="<%= BASE_URL %>favicon.ico">

        <link href=" {{ ('css/atmos.min.css') }}" rel="stylesheet">
        <script src="{{ ('js/atmos.min.js') }}"></script>
      


    </head>
    <body >
    
        <div id="app">
            <router-view></router-view>
        </div>
        <script src="{{ ('js/app.js') }}"></script>
          <script src="{{ ('js/atmos.min.js') }}"></script>

    </body>
    </html>
