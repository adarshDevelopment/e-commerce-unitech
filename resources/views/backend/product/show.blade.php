@extends('backend.layouts.master')
@section('title', $title.' '.$panel)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')

    <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="col-lg-12">
                <a href="{{route($base_route.'.index')}}" class="btn btn-primary">List {{$panel}}</a>
                <a href="{{route($base_route.'.create')}}" class="btn btn-success">Create {{$panel}} </a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>{{$data['row']->name}}</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$data['row']->title}}</td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td>{{$data['row']->getCategory->name}}</td>
                            </tr>

                            <tr>
                                <th>Subcategory</th>
                                <td>{{$data['row']->getSubcategory->name}}</td>
                            </tr>


                            <tr>
                                <th>Price</th>
                                <td>{{$data['row']->price}}</td>
                            </tr>


                            <tr>
                                <th>Slug</th>
                                <td>{{$data['row']->slug}}</td>
                            </tr>

                            <tr>
                                <th>Quantity</th>
                                <td>{{$data['row']->quantity}}</td>
                            </tr>

                            <tr>
                                <th>Specification</th>
                                <td>
                                    @foreach($data['row']->specifications as $specification)
                                        <ul>
                                            <li> {{App\Models\Attribute::find($specification->attribute_id)->name}}: {{$specification->specification_value}} </li>
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>


                            <tr>
                                <th>Discount</th>
                                <td>{{$data['row']->discount}}</td>
                            </tr>

                            <tr>
                                <th>Short Description</th>
                                <td>{{$data['row']->short_description}}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{!! $data['row']->description !!}</td>
                            </tr>

                            <tr>
                                <th>Tags</th>
                                <td>
                                    @foreach($data['row']->tags as $tag)
                                        <ul>
                                            <li>{{$tag->name}}</li>
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Display Attributes</th>
                                <td>
                                    @foreach($data['row']->productAttributes as $attribute)
                                        <ul>
                                            <li>{{App\Models\Attribute::find($attribute->attribute_id)->name}}: {{$attribute->attribute_value}} </li>
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Images</th>
                                <td>
                                    @foreach($data['row']->productImage as $image)
                                        <img src="{{asset('images/backend/product/' . $image->image_name)}}" alt="" width="100">
                                        <br>
                                    @endforeach
{{--                                {{$data['row']->getImage-}}}--}}

                                </td>
                            </tr>


                            @include('backend.includes.status')




                            <tr>
                                <th>Created at</th>
                                <td>{{$data['row']->created_at}}</td>
                            </tr>

                            <tr>
                                <th>Updated at</th>
                                <td>{{$data['row']->updated_at}}</td>
                            </tr>



                        </table>
                    </div>

                </div>


            </div>
        </section>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection









