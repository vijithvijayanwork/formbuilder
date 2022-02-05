<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Forms</title>
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

                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/') }}" class="btn btn-light">Home</a></div>
                        </div>

                        <?php
                        $i = 1;
                        foreach ($forms as $form) {
                            ?>
                            <div>
                                <h3><?php echo $form->formname; ?></h3>
                                <form name="<?php echo strtolower($form->formname); ?>" id="<?php echo strtolower($form->formname); ?>" action="<?php echo $form->formaction; ?>" method="<?php echo $form->formmethod ?>">
                                    <div class="row margintop fb-render" id="fb-render-<?php echo $i; ?>">

                                    </div>
                                </form>
                                <input type='hidden' id='hform-<?php echo $i; ?>' class='hform' name='hform' value='<?php echo $form->formdata; ?>'>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $app->make('url')->to('/'); ?>">
        </article>
        <footer>
            <script src="{{asset('assets/js/custom/form-render.min.js')}}"></script>
            <script src="{{asset('assets/js/custom/forms.js')}}"></script>
            <script src="{{asset('assets/plugins/blockui/jquery.blockui.js')}}"></script>
            <script src="{{asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
            <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
            <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
        </footer>
        <style>
            .margintop {
                margin-top: 10px;
            }
        </style>
    </body>
</html>
