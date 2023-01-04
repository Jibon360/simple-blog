@extends('backend.layouts.master')
@section('title', 'admin create post')
@section('post', 'active')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Create Post
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="post_tittle" class="form-label">Post Title</label>
                                <input type="text" name="post_tittle" id="post_tittle" class="form-control"
                                    placeholder="enter post name" value="{{ old('post_tittle') }}">
                                @error('post_tittle')
                                    <span id="helpId" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_descriptions" class="form-label">Post Descriptions</label>
                                <textarea class="form-control" name="post_descriptions" id="post_descriptions" rows="10"
                                    placeholder="write post descriptions">{{ old('post_descriptions') }}</textarea>
                                @error('post_descriptions')
                                    <span id="helpId" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_image" class="form-label">Post Image</label>
                                <input type="file" name="post_image" id="post_image" class="form-control"
                                    value="{{ old('post_image') }}">
                                @error('post_image')
                                    <span id="helpId" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Post Category</label>
                                <select class="form-control " name="category_id" id="category_id">
                                    <option style="display: none"  value="">Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}</option>
                                    @empty
                                        <option>No Category Found</option>
                                    @endforelse

                                </select>
                                @error('category_id')
                                    <span id="helpId" class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="">
                                <a href="{{ route('post.index') }}" class=" btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Create Post</button>
                            </div>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
