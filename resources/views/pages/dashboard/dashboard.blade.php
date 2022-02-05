@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<header></header>
<article>
    <div class="container">
        <div class="row pt-xl-5 pl-xl-4">
            <div class="col-md-9">
                <h3>Form Builder - Dashboard</h3>
            </div>
            <div class="col-md-3">
                <h4>Hi, <?php echo ucwords($user); ?></h4>
                <a class="btn btn-primary" href="{{ url('logout') }}"><b>Logout</b></a>
            </div>
        </div>
        <div class="row margintop">
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
                <a class="btn btn-primary" href="{{ url('create_form') }}"><b>New Form</b></a>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Form Id</th>
                        <th>Form Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($forms as $index => $form) {
                        ?>
                        <tr>
                            <td>{{$index + $forms->firstItem()}} </td>
                            <td><?php echo $form->formname; ?></td>
                            <td>
                                <a class="view btn btn-primary" href="edit_form/<?php echo $form->id; ?>">Edit</a>
                                <a class="view btn btn-primary deleteform" id="delete-<?php echo $form->id; ?>" href="javascript:void(0);">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $forms->links() !!}
            </div>
        </div>
    </div>
    <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $app->make('url')->to('/'); ?>">
</article>
<style>
    .margintop {
        margin-top: 10px;
    }
</style>
<script src="{{asset('assets/js/custom/deleteform.js')}}"></script>
@endsection