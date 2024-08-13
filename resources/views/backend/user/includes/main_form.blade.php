<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required' =>'required']) !!}
    @if($errors->has('name'))
        <span class="text-danger">{!! $errors->first('name') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required' =>'required']) !!}
    @if($errors->has('email'))
        <span class="text-danger">{!! $errors->first('email') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Select Role') !!}
    {!! Form::select('role_id',$data['roles'],null,['class' => 'form-control','placeholder' => "Select Role", 'required' =>'required']) !!}
    @if($errors->has('role_id'))
        <span class="text-danger">{!! $errors->first('role_id') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
    @if($errors->has('password'))
        <span class="text-danger">{!! $errors->first('password') !!}</span>
    @endif
</div>


{!! Form::submit($button, ['class' => 'btn btn-success']) !!}
{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
