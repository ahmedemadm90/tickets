@if ($message = Session::get('success'))
    <div class="alert alert-success m-2 text-capitalize">
        <p>{{ $message }}</p>
    </div>
@elseif($message = Session::get('error'))
    <div class="alert alert-danger m-2 text-capitalize">
        <p>{{ $message }}</p>
    </div>
@endif
