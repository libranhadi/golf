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

    <title>{{$title ?? 'Golf Course' }}</title>
{{-- style --}}

@stack('before-style')
@include('includes.style')
@stack('after-style')    

  </head>

  <body>
    @include('includes.navbar')
  
    <!-- page-content -->
    <main class="py-4">
            @yield('content')
    </main>
@include('includes.footer')
    <!-- Bootstrap core JavaScript -->
    {{-- script --}}

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
  
  </body>
</html>
