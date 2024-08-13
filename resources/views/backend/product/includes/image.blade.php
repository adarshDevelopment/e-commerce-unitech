<table class="table table-striped table-bordered" id="image_wrapper">
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>
            {!!  Form::file('image_file[]', null,['class' => 'form-control'])!!}
        </td>
        <td><input type="text" name="image_title[]" class="form-control" placeholder="Enter Image Title"/></td>

    </tr>
</table>

