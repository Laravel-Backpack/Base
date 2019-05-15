{{-- Bootstrap Notifications using Prologue Alerts --}}
<script type="text/javascript">
  require(['jquery', 'pnotify'], function($, PNotify) {

      PNotify.prototype.options.styling = "bootstrap4";
      PNotify.prototype.options.styling = "fontawesome";

      @foreach (Alert::getMessages() as $type => $messages)
          @foreach ($messages as $message)

              $(function(){
                new PNotify({
                  // title: 'Regular Notice',
                  text: "{!! str_replace('"', "'", $message) !!}",
                  type: "{{ $type }}",
                  icon: false
                });
              });

          @endforeach
      @endforeach

  });
</script>