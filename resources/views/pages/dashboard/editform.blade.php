@extends('layouts.app')
@section('title', 'Edit Form')
@section('content')
<header></header>
<article>
    <div class="container">
        <div class="row pt-xl-5 pl-xl-4">
            <div class="col-md-9">
                <h3>Form Builder - Edit Form</h3>
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
                <a class="btn btn-primary" href="{{ url('dashboard') }}"><b>Back</b></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <input type="text" name="formname" id="formname" class="form-control" placeholder="Form Name" required="required" maxlength="255" value="<?php echo $form->formname; ?>">
                <span id="formname_error" class="err"></span>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margintop">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <input type="text" name="formaction" id="formaction" class="form-control" placeholder="Form Action" maxlength="255" value="<?php echo $form->formaction; ?>">
                <span id="formaction_error" class="err"></span>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margintop">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <select name="formmethod" id="formmethod" class="form-control" placeholder="Form Method">
                    <option value="get" <?php
                    if ($form->formmethod == 'get') {
                        echo ' selected="selected"';
                    }
                    ?>>GET</option>
                    <option value="post" <?php
                    if ($form->formmethod == 'post') {
                        echo ' selected="selected"';
                    }
                    ?>>POST</option>
                </select>
                <span id="formmethod_error" class="err"></span>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margintop">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <textarea name="formBuilder" id="formBuilder"></textarea>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <input type="hidden" id="fid" name="fid" value="<?php echo $form->id; ?>">
    <input type='hidden' id='formdata' name='formdata' value='<?php echo $form->formdata; ?>' >
    <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $app->make('url')->to('/'); ?>">
</article>
<script src="{{asset('assets/js/custom/form-builder.min.js')}}"></script>
<script src="{{asset('assets/js/custom/editform.js')}}"></script>
<style>
    .margintop {
        margin-top: 10px;
    }
</style>
@endsection