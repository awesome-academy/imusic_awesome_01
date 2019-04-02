<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ mix('/common/css/admin/admin.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('style')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.common.header')
        @include('admin.common.aside')
        <div class="content-wrapper">
            @include('admin.common.content_header')
            @yield('content')
        </div>
        @include('admin.common.footer')
        @include('admin.common.aside_control')
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ mix('/common/js/admin/admin.js') }}"></script>
    @yield('script')
</body>

</html>
