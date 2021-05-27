@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="card-title btn btn-primary btn-sm float-right text-white" data-toggle="modal" data-target="#new_video">
                        Add New Video
                    </button>
                    <h6 class="card-title">Videos</h6>

                     <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Title</th>
                                <th>Poster</th>
                                <th>File</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Actions</th>
                                

                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($videos))
                                    @foreach($videos as $row)

                                    @php
                                        $category = DB::Table('categories')->where('id',$row->category_id)->first();
                                    @endphp
                                    
                                        <tr>
                                            <td>{{$row->title}}</td>
                                            <td><img src="{{'/images/'.$row->poster}}"></td>
                                            <td>{{$row->file}}</td>
                                            <td>${{$row->price}}</td>
                                            <td>@if(isset($category)){{$category->title}}@endif</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>
                                                <a href="{{'/view_videos/'.$row->id}}"><button class="btn btn-warning">Edit</button></a>
                                                <a href="{{'/delete_video/'.$row->id}}"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
                    <div id="new_video" class="modal fade" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Video</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="m-body">
                                    <span id="form_result"></span>
                                    <form id="btn-submit" method="post" action="/view_videos" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="name" name="title"  aria-describedby="emailHelp" placeholder="Video Title">

                                            @if ($errors->has('title'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('title') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input style="width: 100% !important;" type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="name" name="price"  aria-describedby="emailHelp" placeholder="Video Price">

                                            @if ($errors->has('price'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('price') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video File</label>
                                            <input class="form-control" accept="video/*" type="file" name="video">

                                            @if ($errors->has('video'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Description</label>
                                            <textarea name="description" class="form-control" rows="3" required></textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('description') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Category</label>
                                            
                                            <select class="form-select" aria-label="Default select example" name="category_id">
                                              <option selected>Categories</option>
                                                @if(isset($categories))
                                                @foreach($categories as $row)
                                              <option value="{{$row->id}}">{{$row->title}}</option>
                                              @endforeach
                                              @endif
                                              
                                            </select>

                                            @if ($errors->has('video'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                                        </span>
                                            @endif
                                        </div>


                                        <div class="modal-footer">
                                            <input type="submit" name="action_button"  class="btn btn-primary btn-block" value="Add" />
                                            
                                            <span
                                                className="close cursor-pointer"
                                                data-dismiss="modal"
                                                aria-label="Close"
                                                id="myModalClose">
                                            </span>
                                        
                                            <input type="hidden" name="_token" value={{csrf_token()}}>

                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

@endsection

