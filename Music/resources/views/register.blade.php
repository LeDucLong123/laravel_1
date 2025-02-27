<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
{{-- {{ asset('pregister/') }} --}}
    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('pregister/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('pregister/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('pregister/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('pregister/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('pregister/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="{{ route('auth.signup') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name">
                        </div>
                        @if ($errors->has('name'))
                            <div class="input-group" style="color: red;">{{ $errors->first('name') }}</div>
                        @endif
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Account" name="account">
                        </div>
                        @if ($errors->has('account'))
                            <div class="input-group" style="color: red;">{{ $errors->first('account') }}</div>
                        @endif
                        @if ($errors->has('account_exists'))
                            <div class="input-group" style="color: red;">{{ $errors->first('account_exists') }}</div>
                        @endif
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <div class="input-group" style="color: red;">{{ $errors->first('password') }}</div>
                        @endif
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <div class="input-group" style="color: red;">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <a href="{{ route('login') }}" ><button class="btn btn-success"> < Back to login page</button></a>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('pregister/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('pregister/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('pregister/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('pregister/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('pregister/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->