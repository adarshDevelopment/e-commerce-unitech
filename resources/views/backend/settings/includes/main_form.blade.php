<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required'=>'required']) !!}
    @if($errors->has('name'))
        <span class="text-danger">{!! $errors->first('name') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('street_address', 'Street Address') !!}
    {!! Form::text('street_address', null, ['class' => 'form-control', 'placeholder' => 'Enter street_address', 'required'=>'required']) !!}
    @if($errors->has('street_address'))
        <span class="text-danger">{!! $errors->first('street_address') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter City', 'required'=>'required']) !!}
    @if($errors->has('city'))
        <span class="text-danger">{!! $errors->first('city') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('country', 'Country') !!}
    {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Enter country', 'required'=>'required']) !!}
    @if($errors->has('country'))
        <span class="text-danger">{!! $errors->first('country') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('about_us', 'About Us'); !!}
    {!! Form::textarea('about_us', null,['class' => 'form-control','rows' => 2]); !!}
    @if($errors->has('about_us'))
        <span class="text-danger">{!! $errors->first('about_us') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required'=>'required']) !!}
    @if($errors->has('email'))
        <span class="text-danger">{!! $errors->first('email') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone', 'required'=>'required']) !!}
    @if($errors->has('phone'))
        <span class="text-danger">{!! $errors->first('phone') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('pan_no', 'Pan Number') !!}
    {!! Form::text('pan_no', null, ['class' => 'form-control', 'placeholder' => 'Enter pan_no']) !!}
    @if($errors->has('pan_no'))
        <span class="text-danger">{!! $errors->first('pan_no') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('facebook', 'Facebook') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Enter facebook']) !!}
    @if($errors->has('facebook'))
        <span class="text-danger">{!! $errors->first('facebook') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('twitter', 'Twitter') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Enter twitter']) !!}
    @if($errors->has('twitter'))
        <span class="text-danger">{!! $errors->first('twitter') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('youtube', 'Youtube') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Enter youtube']) !!}
    @if($errors->has('youtube'))
        <span class="text-danger">{!! $errors->first('youtube') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('instagram', 'Instagram') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Enter instagram']) !!}
    @if($errors->has('instagram'))
        <span class="text-danger">{!! $errors->first('instagram') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('google_map', 'Google Map') !!}
    {!! Form::text('google_map', null, ['class' => 'form-control', 'placeholder' => 'Enter google_map']) !!}
    @if($errors->has('google_map'))
        <span class="text-danger">{!! $errors->first('google_map') !!}</span>
    @endif
</div>



<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1 , ['class'=> 'form-check-input']) !!} Active
    {!! Form::radio('status', 0) !!} De-Active
</div>



<div class="form-group">
    {{Form::label('logo_file', 'Logo')}}
    {{Form::file('logo_file', ['class' => 'form-control'])}}
    @if($errors->has('logo_file'))
        <span class="text-danger">{!! $errors->first('logo_file') !!}</span>
    @endif
</div>

<div class="form-group">
    {{Form::label('favicon_file', 'Fav Icon')}}
    {{Form::file('favicon_file', ['class' => 'form-control'])}}
    @if($errors->has('favicon_file'))
        <span class="text-danger">{!! $errors->first('favicon_file') !!}</span>
    @endif
</div>






{!! Form::submit($button, ['class' => 'btn btn-success']) !!}
{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}

