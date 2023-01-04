@extends('backend.layouts.master')
@section('title', 'admin create category')
@section('category', 'active')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Created Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" name="category_name" id="category_name" class="form-control"
                                    placeholder="enter category name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span id="helpId" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <a href="{{ route('category.index') }}" class=" btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Create category</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
