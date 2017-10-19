@include('layouts.head');

</head>
<body>

{{-- @if(Auth::check()) --}}
  @include('layouts.nav')
{{-- @endif --}}
  @yield('content')

  @include('layouts.footer')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ mix('js/all.js') }}"></script>

</body>
</html>
