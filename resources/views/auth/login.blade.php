@extends('layouts.auth')
@section('title',"Login")

@section('content')
<div class="brand-logo">
    <img src="{{url('assets/images/logo.svg')}}" alt="logo">
</div>
<form class="pt-3" id="login_form">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
    </div>
    <div class="mt-3 d-grid gap-2">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
    </div>
</form>
@endsection

@section('script')
<script>
    $('#login_form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "{{ route('login.auth') }}",
            dataType: 'json',
            method: 'POST',
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function(res) {

            },
            error: function(res) {
                $('.err-msg').remove();
                var errors = res.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`input[name="${key}"]`).after(`<small class="err-msg text-danger">${value}</small>`);
                });
            }
        });
    });
</script>
@endsection