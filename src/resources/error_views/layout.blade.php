<html>
  <head>
    <title>{{ config('backpack.base.project_name') }} Error @yield('error_number')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 400;
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #ecf0f5;
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
      }

      .error_number {
        font-size: 196px;
      }

      .title {
        font-size: 36px;
      }

      .description {
        font-size: 22px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="error_number">
          @yield('error_number')
        </div>
        <div class="title">
          @yield('title')
        </div>
        <div class="description">
          <br>
          <small>
            @yield('description')
         </small>
       </div>
      </div>
    </div>
  </body>
</html>