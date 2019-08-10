{{-- Bootstrap Notifications using Prologue Alerts & PNotify JS --}}
<script type="text/javascript">
  Noty.overrideDefaults({
    layout   : 'topRight',
    theme    : 'backstrap',
    timeout  : 2500, 
    closeWith: ['click', 'button'],
  });

  @foreach (\Alert::getMessages() as $type => $messages)

      @foreach ($messages as $message)

        new Noty({
          type: "{{ $type }}",
          text: "{!! str_replace('"', "'", $message) !!}"
        }).show();

      @endforeach
  @endforeach
</script>