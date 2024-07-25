<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Site Title -->
    <title>{{ $title ?? ''}}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @stack('css')
</head>

<body>
  

    <div class="card text-center">  
        @include('../layouts/header')
        <div class="card-body">
            @yield('content')
        </div>
        @include('../layouts/footer')
    </div>
    <!-- Start footer Area -->
    <!-- End footer Area -->
    <script src="{{asset('website/js/vendor/jquery-2.2.4.min.js ') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>