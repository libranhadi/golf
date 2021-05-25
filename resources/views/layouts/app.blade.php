<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{$title ?? 'BWAstore' }}</title>
{{-- style --}}

@stack('before-style')
@include('includes.style')
@stack('after-style')    

  </head>

  <body>
    <!-- navigasi -->
    {{-- @include('includes.navbar') --}}
  
    <!-- page-content -->
  @yield('content')
{{-- @include('includes.footer') --}}
    <!-- Bootstrap core JavaScript -->
    {{-- script --}}

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
  
  </body>
</html>
