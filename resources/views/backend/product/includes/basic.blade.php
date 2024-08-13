<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id',$data['categories'], null,['class' => 'form-control','placeholder' => 'Select','required' =>'required']); !!}
    @if($errors->has('category_id'))
        <span class="text-danger">{!! $errors->first('category_id') !!}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('subcategory_id', 'SubCategory'); !!}
    {!! Form::select('subcategory_id',[], null,['class' => 'form-control','placeholder' => 'Select','required' =>'required']); !!}
    @if($errors->has('subcategory_id'))
        <span class="text-danger">{!! $errors->first('subcategory_id') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title', null,['class' => 'form-control','required' =>'required']); !!}
    @if($errors->has('title'))
        <span class="text-danger">{!! $errors->first('title') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug'); !!}
    {!! Form::text('slug', null,['class' => 'form-control','required' =>'required']); !!}
    @if($errors->has('slug'))
        <span class="text-danger">{!! $errors->first('slug') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('price', 'Price'); !!}
    {!! Form::number('price', null,['class' => 'form-control','required' =>'required']); !!}
    @if($errors->has('price'))
        <span class="text-danger">{!! $errors->first('price') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('discount', 'Discount'); !!}
    {!! Form::number('discount', null,['class' => 'form-control', 'min' => '1', 'max'=>'20']); !!}
    @if($errors->has('discount'))
        <span class="text-danger">{!! $errors->first('discount') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('quantity', 'Quantity'); !!}
    {!! Form::number('quantity', null,['class' => 'form-control','required' =>'required']); !!}
    @if($errors->has('quantity'))
        <span class="text-danger">{!! $errors->first('quantity') !!}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1) !!} Active
    {!! Form::radio('status', 0, ['class'=> 'form-check-input']) !!} De-Active
</div>
<div class="form-group">
    {!! Form::label('featured_product','Featured Product') !!}
    {!! Form::radio('featured_product', 1) !!} Active
    {!! Form::radio('featured_product', 0, ['class'=> 'form-check-input']) !!} De-Active
</div>



<div class="form-group">
    {!! Form::label('short_description', 'Short Description'); !!}
    {!! Form::textarea('short_description', null,['class' => 'form-control','rows' => 2]); !!}
    @if($errors->has('short_description'))
        <span class="text-danger">{!! $errors->first('short_description') !!}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('description', 'Description'); !!}
    {!! Form::textarea('description', null,['class' => 'form-control']); !!}
    @if($errors->has('description'))
        <span class="text-danger">{!! $errors->first('description') !!}</span>
    @endif
</div>


