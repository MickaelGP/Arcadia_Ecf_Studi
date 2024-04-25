<div class="container w-50 mt-2 text-center" id="alertSuccess">
    @if (session('success'))
        <div class="container alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="container alert alert-danger text-center">
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
