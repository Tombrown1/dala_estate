@extends('layouts.master')
@section('pageTitle', 'PropertyCategory')
@section('content')

<div class="content">
    <div class="container">
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
        <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Add Property Category</h3>
            </div>

            <div class="card-body">
                <form role="form" action="{{ url('/admin/propertycategory/create') }}" method="POST" >
                    {{ csrf_field() }}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="text" class="form-control" name="name" Required/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Brief Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add" class="btn btn-success">
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive p-2">
                <table class="table table-hover" id="example2">
                    <thead>
                    <tr>
                        <td>S/N</td>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($propertycat as $category)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->slug}}</td>
                               <td>
                            <form action="{{route('del.property.category', ['id'=>$category->id])}}" method="POST">
                              {{ csrf_field() }}
                              {{ Method_field('DELETE') }}
                               <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                            </tr>
                        @empty

                        @endforelse
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div><!-- /.box -->
        </div>
        </div>
    </div>
</div>

@endsection