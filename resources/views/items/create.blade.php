@extends('layouts.master')

@section('content')



<?php
    $data = Session::get('data');
?>
<h1>{{ __('Create item') }}</h1> 


    @include('items.form', ['submitButtonText' => __('Create New Item')])



@stop