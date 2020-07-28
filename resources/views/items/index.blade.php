@extends('layouts.master')
@section('heading')
    <h1>{{ __('All Inventory') }}</h1>
@stop

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#package" role="tab" aria-controls="package" aria-selected="false">{{ __('Package') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#simcard" role="tab" aria-controls="simcard" aria-selected="false">{{ __('Simcard') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#connectedcar" role="tab" aria-controls="connectedcar" aria-selected="false">{{ __('Connected car') }}</a>
    </li>
</ul>


<div class="tab-content" id="myTabContent">
    </br>   
    <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-tab">
        <table class="table table-hover" id="package-table">
            <thead>
                <tr>
                    <th>{{ __('Package number') }}</th>
                    <th>{{ __('Package status') }}</th>
                    <th>{{ __('IMEI') }}</th>
                    <th>{{ __('Comments') }}</th>
                </tr>
            </thead>
        </table>                 
    </div>
    
    <div class="tab-pane fade" id="simcard" role="tabpanel" aria-labelledby="simcard-tab">
        <table class="table table-hover" id="simcard-table">
            <thead>
                <tr>
                    <th>{{ __('2') }}</th>
                    <th>{{ __('Vat') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th class="action-header"></th>
                    <th class="action-header"></th>
                    <th class="action-header"></th>
                </tr>
            </thead>
        </table>  
    </div>

    <div class="tab-pane fade" id="connectedcar" role="tabpanel" aria-labelledby="connectedcar-tab">
        <table class="table table-hover" id="connectedcar-table">
            <thead>
                <tr>
                    <th>{{ __('3') }}</th>
                    <th>{{ __('Vat') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th class="action-header"></th>
                    <th class="action-header"></th>
                    <th class="action-header"></th>
                </tr>
            </thead>
        </table> 
    </div>

</div>

@stop

@push('scripts')
<style type="text/css">
    .table > tbody > tr > td {
        border-top:none !important;
    }
    .table-actions {
       opacity: 0;
    }
    #clients-table tbody tr:hover .table-actions{
      opacity: 1;
    }
</style>
<script>
    $(function () {
        $('#package-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('items.data') !!}',
            language: {
                url: '{{ asset('lang/' . (in_array(\Lang::locale(), ['dk', 'en']) ? \Lang::locale() : 'en') . '/datatable.json') }}'
            },
            name:'search',
            drawCallback: function(){
                var length_select = $(".dataTables_length");
                var select = $(".dataTables_length").find("select");
                select.addClass("tablet__select");
            },
            autoWidth: true,
            columns: [
                {data: 'package_number', name: 'package_number'},
                {data: 'package_status', name: 'package_status'},
                {data: 'package_imei', name: 'package_imei'},
                {data: 'package_comments', name: 'package_comments'},
            ]
        });

    });
    $(document).ready(function () {
        if(!getCookie("step_client_index")) {
            var canCreateTask = '{{ auth()->user()->can('task-create') }}';
            var canCreateProject = '{{ auth()->user()->can('project-create') }}';

            $("#projects").addClass("in");
            $("#tasks").addClass("in");
            // Instance the tour
            var tour = new Tour({
                storage: false,
                backdrop: true,
            });
            tour.addStep({
                element: "#clients-table",
                title: "{{trans("Client overview")}}",
                content: "{{trans("All your active clients will be shown here")}}",
                placement: 'top'
            })
            if(canCreateTask) {
                tour.addStep( {
                    element: "#newTask",
                    title: "{{trans("Create task")}}",
                    content: "{{trans("Same as with clients you can create a new task. Tasks has a primary user assigned, and a client, it can also be related to a project")}}"
                })
            }
            if (canCreateProject) {
                tour.addStep({
                    element: "#newProject",
                    title: "{{trans("Create project")}}",
                    content: "{{trans("Projects are used to keep track of tasks that might be related to a bigger assignment for the client. And gives the possibility of multiple people working various tasks and keep track of the tasks.")}}",
                })
            }
            // Initialize the tour
            tour.init();

            tour.start();
            setCookie("step_client_index", true, 1000)
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