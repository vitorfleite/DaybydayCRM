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
        {!! Form::label('package', __('Situação'). ':', ['class' => 'control-label thin-weight']) !!}
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
        {!! Form::label('package', __('ICCID'). ':', ['class' => 'control-label thin-weight']) !!}
        {!! 
            Form::text('package',  
            isset($data['owners']) ? $data['owners'][0]['package'] : null, 
            ['class' => 'form-control']) 
        !!}
    </div>
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
        {!! Form::label('package', __('Comments'). ':', ['class' => 'control-label thin-weight']) !!}
        {!! 
            Form::text('package',  
            isset($data['owners']) ? $data['owners'][0]['package'] : null, 
            ['class' => 'form-control']) 
        !!}
    </div>
</div>
<hr>
<div class="col-sm-3">
    <p class="calm-header">{{ __('Connected car') }}</p>
</div>
<div class="col-sm-9" id="connectedCar">
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
</div>

<hr>
<div class="col-sm-10">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-md btn-brand', 'id' => 'submitItem']) !!}
</div>
