{{-- Bootstrap Notifications using Prologue Alerts & PNotify JS --}}
<script type="text/javascript">
  Noty.overrideDefaults({
    layout   : 'topRight',
    theme    : 'backstrap',
    timeout  : 2500, 
    closeWith: ['click', 'button'],
    // animation: {
    //     open : 'animated bounceInRight',
    //     close: 'animated bounceOutRight'
    // }
  });

  // PNotify.defaults.styling = 'bootstrap4'; // Bootstrap version 4
  // PNotify.defaults.icons = 'fontawesome4'; // Font Awesome 4
  // PNotify.defaults.icon = false;

  @foreach (\Alert::getMessages() as $type => $messages)

      @php
        switch ($type) {
          case 'warning':
          case 'notice':
          case 'notice':
            $type = 'warning';
            break;
          
          case 'info':
          case 'default':
          case 'primary':
          case 'blue':
            $type = 'info';
            break;

          case 'success':
          case 'green':
            $type = 'success';
            break;

          case 'danger':
          case 'red':
          case 'error':
            $type = 'error';
            break;

          default:
            $type = 'info';
            break;
        }
      @endphp

      @foreach ($messages as $message)

        new Noty({
          type: "{{ $type }}",
          text: "{!! str_replace('"', "'", $message) !!}"
        }).show();

      @endforeach
  @endforeach
</script>