@extends('backend.layouts.master')
@section('title', 'all post list')
@section('post', 'active')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>post List</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ session()->get('message') }}</div>
                        @endif
                        <div class="table-responsive">
                            <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                            aria-describedby="table-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>
                                                        Si No
                                                    </th>
                                                    <th>post Tittle</th>
                                                    <th>post Descriptions</th>
                                                    <th>post Image</th>
                                                    <th>Created User Name </th>
                                                    <th>Created User Image </th>
                                                    <th>Category</th>
                                                    <th>Created Time</th>
                                                    <th>Updated Time</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- // id	post_tittle	post_descriptions	post_image	category_id	user_id	created_at	updated_at --}}

                                                @forelse ($posts as $post)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td>{{ $post->post_tittle }}</td>
                                                        <td>{{ $post->post_descriptions }}</td>
                                                        <td><img src="{{ asset($post->post_image) }}" class=" img-fluid"
                                                                alt=""></td>
                                                        <td>{{ $post->users->name }}</td>
                                                        <td><img src="{{ asset($post->users->image) }}" class=" img-fluid" alt=""></td>
                                                        <td>{{ $post->categories->category_name }}</td>

                                                        <td>
                                                            <ul>
                                                                @isset($post->created_at)
                                                                    <li>Day: {{ $post->created_at->format('d/M/Y') }}</li>
                                                                    <li>Time: {{ $post->created_at->format('h:i:s A') }}
                                                                    </li>
                                                                    <li class="text-info">
                                                                        {{ $post->created_at->diffForHumans() }}</li>
                                                                @endisset

                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @isset($post->updated_at)
                                                                    <li>Day: {{ $post->updated_at->format('d/M/Y') }}</li>
                                                                    <li>Time: {{ $post->updated_at->format('h:i:s A') }}
                                                                    </li>
                                                                    <li class="text-info">
                                                                        {{ $post->updated_at->diffForHumans() }}</li>
                                                                @endisset

                                                            </ul>
                                                        </td>
                                                        <td class="d-flex">
                                                            <div>
                                                                <form
                                                                    action="{{ route('post.destroy', ['post' => $post->id]) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </div>
                                                            <div class="ml-3">
                                                                <a href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                                    class=" ms-2 btn btn-success btn-sm">Edit</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
