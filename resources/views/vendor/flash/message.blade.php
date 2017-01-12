<script>
    Messenger.options = {
        extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
        theme: 'flat'
    }
</script>

@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])

    @else
        <script>

            @if(session('flash_notification.level') == 'danger' || session('flash_notification.level') == 'error')
                var type = 'error';

            @elseif(session('flash_notification.level') == 'success')
                var type = 'success';

            @else
                var type = 'info';
            @endif

            Messenger().post({
                message: "{!! session('flash_notification.message') !!}",
                type: type,
                delay: 6,
            })
        </script>
    @endif
@endif


@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            Messenger().post({
                message: "{{ $error }}",
                type: 'error',
                delay: 6,
            })
        </script>
    @endforeach
@endif
