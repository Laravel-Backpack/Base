{{-- Bootstrap Notifications using Prologue Alerts --}}
<script type="text/javascript">
  PNotify.defaults.styling = 'bootstrap4'; // Bootstrap version 4
  PNotify.defaults.icons = 'fontawesome4'; // Font Awesome 4

  @foreach (Alert::getMessages() as $type => $messages)
      @foreach ($messages as $message)

        new PNotify({
          // title: 'Regular Notice',
          text: "{!! str_replace('"', "'", $message) !!}",
          type: "{{ $type }}",
          icon: false
        });

      @endforeach
  @endforeach
</script>