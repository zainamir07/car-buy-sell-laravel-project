@include('layout.header')

<body class="body-wrapper">

@include('layout.navBar')

@yield('content')

@yield('script')

@include('layout.footer')

@include('layout.script')

</body>
</html>