@extends('backend.layouts.master')
@section('title', $title. ' '. $panel)

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')
    <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">

            <!-- Default box -->
            <div class="col-lg-12">
                <a href="{{route($base_route.'.index')}}" class="btn btn-info">List {{$panel}}</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <h3 class="card-title">Create {{$panel}}</h3>
                    </div>
                    <div class="card-body">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-basic-tab" data-toggle="tab" href="#basic_tab" role="tab" aria-controls="product-desc" aria-selected="true">Basic Product Details</a>
                                <a class="nav-item nav-link" id="product-specification-tab" data-toggle="tab" href="#specification_tab" role="tab" aria-controls="product-comments" aria-selected="false">Specification</a>
                                <a class="nav-item nav-link" id="product-meta-tab" data-toggle="tab" href="#meta_tab" role="tab" aria-controls="product-comments" aria-selected="false">Meta Information</a>
                                <a class="nav-item nav-link" id="product-image-tab" data-toggle="tab" href="#image_tab" role="tab" aria-controls="product-rating" aria-selected="false">Images</a>
                                <a class="nav-item nav-link" id="product-tag-tab" data-toggle="tab" href="#tag_tab" role="tab" aria-controls="product-rating" aria-selected="false">Tag</a>
                                <a class="nav-item nav-link" id="product-attribute-tab" data-toggle="tab" href="#attribute_tab" role="tab" aria-controls="product-rating" aria-selected="false">Attribute</a>
                            </div>
                        </nav>
                        {!! Form::model($data['row'], ['route' => [$base_route. '.update', $data['row']->id], 'method' => 'PUT', 'files' => true ]) !!}
                        {!! Form::hidden('id', $data['row']->id) !!}
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="basic_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.basic')
                                </div>
                                <div class="tab-pane fade" id="specification_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.specification')
                                </div>
                                <div class="tab-pane fade" id="meta_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.meta')
                                </div>
                                <div class="tab-pane fade" id="image_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.image')
                                </div>
                                <div class="tab-pane fade" id="tag_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.tag')
                                </div>
                                <div class="tab-pane fade" id="attribute_tab" role="tabpanel" aria-labelledby="product-desc-tab">
                                    @include('backend.product.includes_edit.attribute')
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Save ' . $panel, ['class' => 'btn btn-info']); !!}
                                {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
                            </div>
                        {!! Form::close() !!}

                    </div>


{{--                    <div class="card-body">--}}

{{--                        {!! Form::model($data['row'], ['route' => [$base_route. '.update', $data['row']->id], 'method' => 'PUT', 'files' => true ]) !!}--}}

{{--                        {!! Form::hidden('id', $data['row']->id) !!}--}}
{{--                        @include($view_path.'.includes.main_form', ['button' => 'Update'])--}}
{{--                        {!! Form::Close() !!}--}}

{{--                    </div>--}}
                </div>



            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js')

    {{--    scripts--}}
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{--slug script--}}
    <script>
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    </script>


    <script>
        CKEDITOR.replace('specification');
    </script>


    <script>
        CKEDITOR.replace('description');
    </script>



    //js for cloning attributes
    <script>
        var attribute_wrapper = $("#attribute_wrapper"); //Fields wrapper
        var add_button_attribute = $("#addMoreAttribute"); //Add button ID
        @if(count($data['row']->productAttributes) == 0)
        var a = 1;
        @else
        var a = {{count($data['row']->productAttributes)}};
        @endif
        $(add_button_attribute).click(function (e) { //on add input button click
            // e.preventDefault();
            var max_fields = 5; //maximum input boxes allowed
            if (a < max_fields) { //max input box allowed
                a++; //text box increment
                //add new row
                $("#attribute_wrapper tr:last").after(
                    '<tr>'+
                    '   <td>{!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                    '   </td>'+
                    '   <td><input tape="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                    '   <td>'+
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                    '   </td>'+
                    '</tr>'
                );
            }else{
                alert('Maximum Attribute Limit is 5');
            }
        });
        //remove row
        $(attribute_wrapper).on("click", ".remove_row", function (e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            a--;
        });
    </script>


    //js for cloning specification
    <script>
        var specification_wrapper = $("#specification_wrapper"); //Fields wrapper
        var add_button_specification = $("#addMoreSpecification"); //Add button ID
        var b = {{count($data['row']->specifications)}};
        @if(count($data['row']->specifications) == 0)
            var b = 1;
        @else
            var b = {{count($data['row']->specifications)}};
        @endif
        $(add_button_specification).click(function (e) { //on add input button click
            // e.preventDefault();
            var max_fields = 5; //maximum input boxes allowed
            if (b < max_fields) { //max input box allowed
                b++; //text box increment
                //add new row
                $("#specification_wrapper tr:last").after(
                    '<tr>'+
                    '   <td>{!! Form::select('specification_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Specification"]) !!}'+
                    '   </td>'+
                    '   <td><input tape="text" name="specification_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                    '   <td>'+
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                    '   </td>'+
                    '</tr>'
                );
            }else{
                alert('Maximum Attribute Limit is 5');
            }
        });
        //remove row
        $(specification_wrapper).on("click", ".remove_row", function (e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            b--;
        });
    </script>





    //text field cloning  for images

{{--    <script>--}}
{{--        var image_wrapper = $("#image_wrapper"); //Fields wrapper--}}
{{--        var add_button_image = $("#addMoreImage"); //Add button ID--}}

{{--        //making sure the variable count starts from how many rows are there in the database that have already been inserted--}}
{{--        @if(count($data['row']->productImage) == 0)--}}
{{--            var y = 1;--}}
{{--        @else--}}
{{--            var y = {{count($data['row']->productImage)}};--}}
{{--        @endif--}}
{{--        $(add_button_image).click(function (e) { //on add input button click--}}
{{--            e.preventDefault();--}}
{{--            var max_fields = 5; //maximum input boxes allowed--}}
{{--            if (y < max_fields) { //max input box allowed--}}
{{--                y++; //text box increment--}}
{{--                //add new row--}}
{{--                $("#image_wrapper tr:last").after(--}}
{{--                    '<tr>'+--}}
{{--                    '   <td>{!!  Form::file('image_file[]', null,['class' => 'form-control'])!!}'+--}}
{{--                    '   </td>'+--}}
{{--                    '   <td><input type="text" name="image_title[]" class="form-control" placeholder="Enter Image Title"/></td>'+--}}
{{--                    '   <td>'+--}}
{{--                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+--}}
{{--                    '   </td>'+--}}
{{--                    '</tr>'--}}
{{--                );--}}
{{--            }else{--}}
{{--                alert('Maximum Attribute Limit is 5');--}}
{{--            }--}}
{{--        });--}}
{{--        //remove row--}}
{{--        $(image_wrapper).on("click", ".remove_row", function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $(this).parents("tr").remove();--}}
{{--            y--;--}}
{{--        });--}}
{{--    </script>--}}





    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#category_id').change(function(){
            var catid = $(this).val();
            $.ajax({
                method: "POST",
                url: "{{route('category.getsubcategory')}}",
                data:{'catid':catid},
                success:function (resp){
                    $('#subcategory_id').html(resp);
                }
            });
        });
    </script>




@endsection





