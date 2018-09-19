@if (Session::has('success'))
    <script>
    new Noty({
        theme: 'sunset',
        type: 'success',
        layout: 'topCenter',
        text: "{!! Session::get('success') !!}",
        timeout: 2000
    }).show();
    </script>
@endif

@if (Session::has('error'))
    <script>
    new Noty({
        theme: 'sunset',
        type: 'success',
        layout: 'topCenter',
        text: "{!! Session::get('error') !!}",
        timeout: 2000
    }).show();
    </script>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif
