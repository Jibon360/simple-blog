@extends('backend.layouts.master')
@section('title', 'all category list')
@section('category', 'active')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Basic DataTables</h4>
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
                                                    <th class="text-center sorting_asc" tabindex="0"
                                                        aria-controls="table-1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="
                              #
                            : activate to sort column descending"
                                                        style="width: 24.4375px;">
                                                        Si No
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Task Name: activate to sort column ascending"
                                                        style="width: 147.281px;">Category Name</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Progress" style="width: 78.5469px;">Created Time</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Members" style="width: 209.547px;">Updated Time</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Due Date: activate to sort column ascending"
                                                        style="width: 89.9531px;">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($categories as $category)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td>{{ $category->category_name }}</td>

                                                        <td>
                                                            <ul>
                                                                @isset($category->created_at)
                                                                    <li>Day: {{ $category->created_at->format('d/M/Y') }}</li>
                                                                    <li>Time: {{ $category->created_at->format('h:i:s A') }}
                                                                    </li>
                                                                    <li class="text-info">
                                                                        {{ $category->created_at->diffForHumans() }}</li>
                                                                @endisset

                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @isset($category->updated_at)
                                                                    <li>Day: {{ $category->updated_at->format('d/M/Y') }}</li>
                                                                    <li>Time: {{ $category->updated_at->format('h:i:s A') }}
                                                                    </li>
                                                                    <li class="text-info">
                                                                        {{ $category->updated_at->diffForHumans() }}</li>
                                                                @endisset

                                                            </ul>
                                                        </td>
                                                        <td class="d-flex">
                                                            <div>
                                                                <form
                                                                    action="{{ route('category.destroy', ['category' => $category->id]) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </div>
                                                            <div class="ml-3">
                                                                <a href="{{ route('category.edit',['category'=>$category->id]) }}"
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
