@extends('admin.layouts.layout-login-3')

@section('scripts')
    <script src="/assets/admin/js/sessions/login.js"></script>
@stop

@section('content')
    <form action="{{route('send-reset-link')}}" id="loginForm" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input type="email" class="form-control form-control-danger" placeholder="Enter email" name="email">
        </div>
        <button class="btn btn-success btn-full">Send Reset Link</button>
    </form>
    <div class="page-copyright">
        <p>Back to <a href="login" style="color:green;">Login</a> Page</p>
    </div>
@stop
