<html>
  <head>
    <title>{{ config('backpack.base.project_name') }} Error 503</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
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

      .title {
        font-size: 156px;
      }

      .quote {
        font-size: 36px;
      }

      .explanation {
        font-size: 24px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="title">503</div>
        <div class="quote">It's not you, it's me.</div>
        <div class="explanation">
          <br>
          <small>
            <?php
              $default_error_message = "The server is overloaded or down for maintenance. Please try again later.";
            ?>
            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
         </small>
       </div>
      </div>
    </div>
  </body>
</html>
