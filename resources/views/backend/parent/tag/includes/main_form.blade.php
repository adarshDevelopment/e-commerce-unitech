<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required' =>'required']) !!}
    @if($errors->has('name'))
        <span class="text-danger">{!! $errors->first('name') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug', 'required' =>'required']) !!}
    @if($errors->has('slug'))
        <span class="text-danger">{!! $errors->first('slug') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1) !!} Active
    {!! Form::radio('status', 0, ['class'=> 'form-check-input']) !!} De-Active
</div>


{!! Form::submit($button, ['class' => 'btn btn-success']) !!}
{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
