<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <link href="{{ mix('/assets/admin/css/laraspace.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.partials.favicons')
</head>
<body class="login-page login-3">

    <div id="app" class="site-wrapper">
        <div class="login-box">
            <div class="box-wrapper">
                @include('admin.layouts.partials.laraspace-notifs')
                <div class="logo-main">
                    <a href="/"><img src="/assets/admin/img/logo.png" alt="Laraspace Logo"></a>
                </div>
                @yield('content')
                <div class="page-copyright">
                    <p>CSTC © {{ date('Y') }}</p>
                </div>
            </div>
        </div>
        <div class="content-box">
            <h1 class="text-center"><b>Welcome</b> to the <br>
                <b>CSTC</b> Alumni Tracking System
            </h1>
        </div>
    </div>

<script src="{{mix('/assets/admin/js/core/plugins.js')}}"></script>
<script src="{{mix('/assets/admin/js/core/app.js')}}"></script>
@yield('scripts')
</body>
</html>
