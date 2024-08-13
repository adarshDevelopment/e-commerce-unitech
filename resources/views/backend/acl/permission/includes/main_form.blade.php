<div class="form-group">
    {!! Form::label('module_id', 'Select Module') !!}
    {!! Form::select('module_id',$data['module'],null,['class' => 'form-control','placeholder' => "Select Category", 'required' =>'required']) !!}
    @if($errors->has('module_id'))
        <span class="text-danger">{!! $errors->first('module_id') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required'=>'required']) !!}
    @if($errors->has('name'))
        <span class="text-danger">{!! $errors->first('name') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('route', 'Route') !!}
    {!! Form::text('route', null, ['class' => 'form-control', 'placeholder' => 'Enter route', 'required'=>'required']) !!}
    @if($errors->has('route'))
        <span class="text-danger">{!! $errors->first('route') !!}</span>
    @endif
</div>



<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1, ['class'=> 'form-check-input']) !!} Active
    {!! Form::radio('status', 0) !!} De-Active
</div>

{!! Form::submit($button, ['class' => 'btn btn-success']) !!}
{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}

