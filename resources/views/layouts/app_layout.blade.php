<!DOCTYPE html>
<html>

<head>
    <title>AssessMent Test</title>
    <meta content="Assessment" name="keywords">
    <meta content="Assessment dashboard" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('shared._html_header')

</head>

<body class=" with-content-panel">
    <div class="all-wrapper menu-side with-side-panel">
        <div class="layout-w">


            
            @yield('content')
        </div>
        <div class="display-type"></div>

        @include('shared._footer')
    </div>



    @include('shared._html_footer')

    @yield('scripts')

</body>

</html>
