<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name') }} |@yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/assets/css/custome.css') }}" />
    @stack('css')
    @FilemanagerScript
</head>


<body>
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('backend.partials.sidebar')
        <!--end sidebar-wrapper-->

        <!--header-->
        @include('backend.partials.header')
        <!--end header-->

        <!--page-wrapper-->
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                   @yield('content')
                </div>
            </div>
        </div>
        <!--end page-wrapper-->

        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--footer -->
        @include('backend.partials.footer')
        <!-- end footer -->
    </div>

    <!--start switcher-->
    @include('backend.partials.switcher')
    <!--end switcher-->

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script type="text/javascript">
        window.onload = function() {
            if(sessionStorage.getItem('darktheme')){
                $("html").addClass("dark-theme");
                $('#darkmode').prop('checked', true);
                $('#lightmode').prop('checked', false);
            }
        }
  </script>
      @include('auth.toast')
   <script>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}');
      @endforeach
    @endif
  </script>
  @stack('js')
  {{-- Delete --}}
  <script src="{{ asset('backend/assets/js/sweetalert2.all.min.js') }}"></script>

  <script>
    $('.delete-confirm').click(function(event) {
      var form = $(this).closest("form");
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
    });

  </script>
  @stack('js')
</body>

</html>
