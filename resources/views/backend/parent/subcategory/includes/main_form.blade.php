<div class="form-group">
    {!! Form::label('category_id', 'Select Subcategory') !!}
    {!! Form::select('category_id',$data['category'],null,['class' => 'form-control','placeholder' => "Select Category", 'required' =>'required']) !!}
    @if($errors->has('category_id'))
        <span class="text-danger">{!! $errors->first('category_id') !!}</span>
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
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug', 'required'=>'required']) !!}
    @if($errors->has('slug'))
        <span class="text-danger">{!! $errors->first('slug') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('short_description', 'Short Description') !!}
    {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => 'Enter short_description', 'required'=>'required']) !!}
    @if($errors->has('short_description'))
        <span class="text-danger">{!! $errors->first('short_description') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter description', 'rows' => 3]) !!}
    @if($errors->has('description'))
        <span class="text-danger">{!! $errors->first('description') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('meta_keyword', 'Meta Keyword') !!}
    {!! Form::text('meta_keyword', null, ['class' => 'form-control', 'placeholder' => 'Enter meta_keyword']) !!}
    @if($errors->has('meta_keyword'))
        <span class="text-danger">{!! $errors->first('meta_keyword') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('meta_title', 'Meta Title') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Enter meta_title']) !!}
    @if($errors->has('meta_title'))
        <span class="text-danger">{!! $errors->first('meta_title') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('meta_description', 'Meta Description') !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Enter meta_description', 'rows' => 3]) !!}
    @if($errors->has('meta_description'))
        <span class="text-danger">{!! $errors->first('meta_description') !!}</span>
    @endif
</div>

<div class="form-group">
    {{Form::label('image_file', 'Image')}}
    {{Form::file('image_file', ['class' => 'form-control'])}}
    @if($errors->has('image_file'))
        <span class="text-danger">{!! $errors->first('image_file') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1) !!} Active
    {!! Form::radio('status', 0, ['class'=> 'form-check-input']) !!} De-Active
</div>

{!! Form::submit($button, ['class' => 'btn btn-success']) !!}
{!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}

