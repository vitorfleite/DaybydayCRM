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
        <form action="{{ action('ItemsController@store') }}" method="post" accept-charset="UTF-8">
        @csrf
            <input name="package_type" type="hidden" value="package">
            <div class="col-sm-3">
                <p class="calm-header">{{ __('Package Information')}}</p>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="package_number" class="control-label thin-weight">{{ __('Package number') }}:</label>
                    <input type="text" name="package_number" id="package_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="package_status" class="control-label thin-weight">{{ __('Package status') }}:</label>
                    <select name="package_status" class="form-control">
                        <option value="installed">{{__('Installed') }}</option>
                        <option value="unistalled">{{ __('Uninstalled') }}</option>
                        <option value="stock">{{ __('Stock') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="package_imei" class="control-label thin-weight">{{ __('IMEI') }}:</label>
                    <input type="text" name="package_imei" id="package_imei" class="form-control">
                </div>
                <div class="form-group">
                    <label for="package_comments" class="control-label thin-weight">{{ __('Comments') }}:</label>
                    <input type="text" name="package_comments" id="package_comments" class="form-control">
                </div>
                <div class="form-group">
                    <label for="package_client" class="control-label thin-weight">{{ __('Assigned to') }}:</label>
                    <select name="package_client" id="package_client" class="form-control">
                        @foreach($clients as $client)
                        <option value="{{$client->company_name}}">{{$client->company_name}}</option>
                    @endforeach
                    </select>
                </div>                                    
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-brand">{{$submitButtonText}}</button>
                </div>  
            </div>  
            </form>                    
        </div>
    
    <div class="tab-pane fade" id="simcard" role="tabpanel" aria-labelledby="simcard-tab">
        <form action="{{ action('ItemsController@store') }}" method="post" accept-charset="UTF-8">
        @csrf
            <input name="package_type" type="hidden" value="simcard">
            <div class="col-sm-3">
                <p class="calm-header">{{ __('SIM card Information')}}</p>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="simcar_dnumber" class="control-label thin-weight">{{ __('SIM card number') }}:</label>
                    <input type="text" name="simcard_number" id="simcardnumber" class="form-control">
                </div>
                <div class="form-group">
                            <label for="simcard_status" class="control-label thin-weight">{{ __('SIM card status') }}:</label>
                            <select name="simcard_status" class="form-control" id="simcard_status">
                                <option value="activated">{{__('Activated') }}</option>
                                <option value="deactivated">{{ __('Deactivated') }}</option>
                            </select>
                        </div>
                <div class="form-group">
                    <label for="simcard_origin" class="control-label thin-weight">{{ __('SIM card origin') }}:</label>
                    <input type="text" name="simcard_origin" id="simcard_origin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="simcard_operator" class="control-label thin-weight">{{ __('SIM card operator') }}:</label>
                    <input type="text" name="simcard_operator" id="simcard_operator" class="form-control">
                </div>
                <div class="form-group">
                    <label for="simcard_comments" class="control-label thin-weight">{{ __('Comments') }}:</label>
                    <input type="text" name="simcard_comments" id="simcard_comments" class="form-control">
                </div>
                <div class="form-group">                      
                    <label for="package_client" class="control-label thin-weight">{{ __('Assigned to') }}:</label>
                    <select name="simcard_client" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{$client->company_name}}">{{$client->company_name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-brand">{{$submitButtonText}}</button>
                </div>  
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="connectedcar" role="tabpanel" aria-labelledby="connectedcar-tab">
    <form action="{{ action('ItemsController@store') }}" method="post" accept-charset="UTF-8">
        @csrf
            <input name="package_type" type="hidden" value="connectedcar">
            <div class="col-sm-3">
                <p class="calm-header">{{ __('Connected car information') }}</p>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="connectedcar_name" class="control-label thin-weight">{{ __('Name') }}:</label>
                    <input type="text" name="connectedcar_name" id="connectedcar_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_model" class="control-label thin-weight">{{ __('Model') }}:</label>
                    <input type="text" name="connectedcar_model" id="connectedcar_model" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_color" class="control-label thin-weight">{{ __('Color') }}:</label>
                    <input type="text" name="connectedcar_color" id="connectedcar_color" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_vin" class="control-label thin-weight">{{ __('VIN') }}:</label>
                    <input type="text" name="connectedcar_vin" id="connectedcar_vin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_year" class="control-label thin-weight">{{ __('Year of manufacture') }}:</label>
                    <input type="text" name="connectedcar_year" id="connectedcar_year" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_plate" class="control-label thin-weight">{{ __('Plate Number') }}:</label>
                    <input type="text" name="connectedcar_plate" id="connectedcar_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_comments" class="control-label thin-weight">{{ __('Comments') }}:</label>
                    <input type="text" name="connectedcar_comments" id="connectedcar_comments" class="form-control">
                </div>
                <div class="form-group">
                    <label for="connectedcar_comments" class="control-label thin-weight">{{ __('Assigned to') }}:</label>
                    <select name="connectedcar_client" class="form-control" id="connectedcar_client">
                    @foreach($clients as $client)
                        <option value="{{$client->company_name}}">{{$client->company_name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-brand">{{$submitButtonText}}</button>
                </div>  
            </div> 
    </form> 
    </div>
</div>
</div>
