@extends('layouts.master')

@section('content')

@push('scripts')

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top

            $('.popoverOption').each(function () {
                var $this = $(this);
                $this.popover({
                    trigger: 'hover',
                    placement: 'left',
                    container: $this,
                    html: true
                });
            });
        });
        $(document).ready(function () {
            if(!getCookie("step_client_create"))
            {
                // Instance the tour
                $("#clients").addClass( "in" );
                var tour = new Tour({
                    storage: false,
                    backdrop:true,
                    steps: [

                        {
                            element: "#clientCreateForm",
                            title: "{{trans("Fill out the form")}}",
                            content: "{{trans("Fill out the form to get started, the only required fields are name, company name, and email")}}",
                            placement:'top'
                        },
                        {
                            element: "#submitClient",
                            title: "{{trans("Click the submit button")}}",
                            content: "{{trans("Click the create new client button, and you're done")}}",
                            placement:'top'
                        }
                    ]});

                // Initialize the tour
                tour.init();

                tour.start();
                setCookie("step_client_create", true, 1000)
            }
            function setCookie(key, value, expiry) {
                var expires = new Date();
                expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 2000));
                document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
            }

            function getCookie(key) {
                var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
                return keyValue ? keyValue[2] : null;
            }
        });
        </script>

@endpush

<?php
    $data = Session::get('data');
?>
<h1>{{ __('Create item') }}</h1> 

<hr>
    
    {!!Form::close()!!}

    {!! Form::open([
            'route' => 'items.store',
            'class' => 'ui-form',
            'id' => 'itemCreateform'
            ]) !!}
    @include('items.form', ['submitButtonText' => __('Create New Item')])

    {!! Form::close() !!}


@stop