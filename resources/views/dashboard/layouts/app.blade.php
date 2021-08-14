<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Ostaz </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/ltr/assets/img/favicon.ico') }}" />

    @include('dashboard.shared.styles.ltr.general')
    @toastr_css


</head>

<body class="alt-menu sidebar-noneoverflow">

    @include('dashboard.shared.header')

    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        @include('dashboard.shared.sidebar')

        <div id="content" class="main-content">
            @yield('content')
        </div>
    </div>
    @include('dashboard.chat-popup.index')

    @include('dashboard.shared.scripts.general')
    @include('dashboard.shared.scripts.trainer')
    @include('dashboard.shared.scripts.student')
    @include('dashboard.shared.scripts.country')
    @include('dashboard.shared.scripts.program')
    @include('dashboard.shared.scripts.category')
    @include('dashboard.shared.scripts.permission')
    @include('dashboard.shared.scripts.supervisor')
    @include('dashboard.shared.scripts.toastr')
    @include('dashboard.shared.scripts.chat')




    <script>
        $(document).ready(function() {
            $('.multiSelect').selectpicker({
                size: '10'
            });
        })



    </script>

@toastr_js
@toastr_render


@if(Session::has('message'))
<script type="text/javascript">
  toastr.info("{!!Session::get('message')!!}")
</script>
@endif

</body>

</html>
