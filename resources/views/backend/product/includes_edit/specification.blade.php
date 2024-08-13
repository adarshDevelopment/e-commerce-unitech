<table class="table table-striped table-bordered" id="specification_wrapper">
    <tr>
        <th>Speification</th>
        <th>Value</th>
        <th>Action</th>
    </tr>
    @foreach($data['row']->specifications as $specification)
        <tr>
            <td>
                {!! Form::select('specification_id[]',$data['attributes'],$specification->attribute_id,['class' => 'form-control','placeholder' => "Select Specification"]) !!}
            </td>
            <td><input type="text" name="specification_value[]" class="form-control" value="{{$specification->specification_value}}" placeholder="Enter Specification Value"/></td>
            {{--        <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>--}}
            <td>
                <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach

</table>
<button class="btn btn-info" type="button" id="addMoreSpecification" style="margin-bottom: 20px">
    <i class="fa fa-plus"></i>
    Add
</button>
