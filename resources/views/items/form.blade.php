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
            <div class="col-sm-3">
                <p class="calm-header">{{ __('Package Information')}}</p>
            </div>
            <div class="col-sm-9" id="primaryContact">
                <div class="form-group">
                    {!! Form::label('packagenumber', __('Package number'). ':', ['class' => 'control-label thin-weight']) !!}
                    {!! 
                        Form::text('packagenumber',  
                        isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                        ['class' => 'form-control']) 
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('package', __('Status'). ':', ['class' => 'control-label thin-weight']) !!}
                    {!! 
                        Form::text('package',  
                        isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                        ['class' => 'form-control']) 
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('package', __('IMEI'). ':', ['class' => 'control-label thin-weight']) !!}
                    {!! 
                        Form::text('package',  
                        isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                        ['class' => 'form-control']) 
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('package', __('Comments'). ':', ['class' => 'control-label thin-weight']) !!}
                    {!! 
                        Form::text('package',  
                        isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                        ['class' => 'form-control']) 
                    !!}
                </div>
                <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-md btn-brand', 'id' => 'submitItem']) !!}
                </div>
            </div>
    </div>
    <div class="tab-pane fade" id="simcard" role="tabpanel" aria-labelledby="simcard-tab">
        <div class="col-sm-3">
            <p class="calm-header">{{ __('SIM card Information')}}</p>
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                {!! Form::label('package', __('SIM card number'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('package', __('SIM card status'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('package', __('SIM card origin'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('package', __('SIM card operator'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('package', __('ICCID'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('package', __('Comments'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('package',  
                    isset($data['owners']) ? $data['owners'][0]['package'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-md btn-brand', 'id' => 'submitItem']) !!}
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="connectedcar" role="tabpanel" aria-labelledby="connectedcar-tab">
        <div class="col-sm-3">
            <p class="calm-header">{{ __('Connected car information') }}</p>
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                {!! Form::label('packagenumber', __('Name'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('Model'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('Color'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('VIN'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('Year of manufacture'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('Plate Number'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('packagenumber', __('Comments'). ':', ['class' => 'control-label thin-weight']) !!}
                {!! 
                    Form::text('packagenumber',  
                    isset($data['owners']) ? $data['owners'][0]['packagenumber'] : null, 
                    ['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-md btn-brand', 'id' => 'submitItem']) !!}
            </div>    
        </div>
    </div>
</div>
</div>
