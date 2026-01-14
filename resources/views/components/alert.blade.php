@props(['type', 'message'])

@session('success')
    
@endsession

@if (session()->has($type))
    <div id="flash-message" class="p-4 mb-4 text-sm text-white rounded {{$type == 'success' ? 'bg-green-500' : 'bg-red-500'}}">
        {{$message}}
    </div>
@endif

<script>
    setTimeout(() => {
        const message = document.getElementById('flash-message');
        if (message) {
            message.remove();
        }
    }, 5000);
</script>