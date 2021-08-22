<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->

    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>@yield('tile')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/app.css')) }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    @include('partials.header')

    @include('partials.sidebar')

    <main class="app-content">
        @yield('content')
    </main>

    <script type="text/javascript" src="{{ asset(mix('js/app.js')) }}"></script>

    {!! Toastr::message() !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000,
            });
        @endforeach
    @endif


    {{-- ==========================sweet alert start================================= --}}
    <script>
        if ($('.delete').length) {
            $('.delete').on('click', function(event) {
                var form = $(this).closest("form");
                // var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to restore it again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes I want',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    }
                });
            });
        }

    </script>
    {{-- ==========================sweet alert end================================= --}}

  </body>
</html>
