{{-- Bootstrap Notifications using Prologue Alerts --}}
<script type="text/javascript">
  PNotify.defaults.styling = 'bootstrap4'; // Bootstrap version 4
  PNotify.defaults.icons = 'fontawesome4'; // Font Awesome 4

  @foreach (Alert::getMessages() as $type => $messages)

      @php
        switch ($type) {
          case 'warning':
          case 'notice':
          case 'notice':
            $type = 'notice';
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

        PNotify.alert({
          // title: 'Regular Notice',
          text: "{!! str_replace('"', "'", $message) !!}",
          textTrusted: true,
          type: "{{ $type }}",
        });

      @endforeach
  @endforeach
</script>