@extends('layouts.admin')
@section('title','Category')
@section('content')
    <h1 class="page-title">Categories</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.category.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name')
                                is-invalid
                                @enderror" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Categories</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Total Products</th>
                                <th>Published</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr class="text-center">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->products->count()}}</td>
                                    <td>{{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <form action="{{route('adminpanel.category.destroy', $category->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
