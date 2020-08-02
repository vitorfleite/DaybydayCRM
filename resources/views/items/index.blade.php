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
                    <th>{{ __('Assigned to') }}</th>
                </tr>
            </thead>
        </table>                 
    </div>
    
    <div class="tab-pane fade" id="simcard" role="tabpanel" aria-labelledby="simcard-tab">
        <table class="table table-hover" id="simcard-table">
            <thead>
                <tr>
                    <th>{{ __('SIM card number') }}</th>
                    <th>{{ __('SIM card status') }}</th>
                    <th>{{ __('SIM card origin') }}</th>
                    <th>{{ __('SIM card operator') }}</th>
                    <th>{{ __('Assigned to') }}</th>
                </tr>
            </thead>
        </table>  
    </div>
  <div class="tab-pane fade" id="connectedcar" role="tabpanel" aria-labelledby="connectedcar-tab">
        <table class="table table-hover" id="connectedcar-table">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Model') }}</th>
                    <th>{{ __('Color') }}</th>
                    <th>{{ __('VIN') }}</th>
                    <th >{{ __('Year of manufacture') }}</th>
                    <th>{{ __('Plate Number') }}</th>
                    <th>{{ __('Assigned to') }}</th>
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
            ajax: '{!! route('items.data.package') !!}',
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
                {data: 'package_client', name: 'package_client'},
            ]
        });
    });
    $(function () {
        $('#simcard-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('items.data.simcard') !!}',
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
                {data: 'simcard_number', name: 'simcard_number'},
                {data: 'simcard_status', name: 'simcard_status'},
                {data: 'simcard_origin', name: 'simcard_origin'},
                {data: 'simcard_operator', name: 'simcard_operator'},
                {data: 'simcard_client', name: 'simcard_client'},
                
            ]
        });
    });
    $(function () {
        $('#connectedcar-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('items.data.connectedcar') !!}',
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
                {data: 'connectedcar_name', name: 'connectedcar_name'},
                {data: 'connectedcar_model', name: 'connectedcar_model'},
                {data: 'connectedcar_color', name: 'connectedcar_color'},
                {data: 'connectedcar_vin', name: 'connectedcar_vin'},
                {data: 'connectedcar_year', name: 'connectedcar_year'},
                {data: 'connectedcar_plate', name: 'connectedcar_plate'},
                {data: 'connectedcar_client', name: 'connectedcar_client'},
            ]
        });
    });
</script>

@endpush