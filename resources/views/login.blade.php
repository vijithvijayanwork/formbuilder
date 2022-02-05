<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Formbuilder - Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header></header>
        <article>
            <div class="container">
                <div class="row pt-xl-5 pl-xl-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4>Login</h4>
                        <form name="loginform" id="loginform" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                <span id="email_error" class="err"></span>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span id="password_error" class="err"></span>
                            </div>
                            <span>@csrf</span>
                            <button id="login" type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/') }}" class="btn btn-light">Home</a></div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $app->make('url')->to('/'); ?>">
        </article>
        <footer>
            <script src="{{asset('assets/plugins/blockui/jquery.blockui.js')}}"></script>
            <script src="{{asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
            <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
            <script src="{{asset('assets/js/custom/login.js')}}"></script>
            <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
        </footer>
    </body>
</html>
