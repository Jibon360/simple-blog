@extends('frontend.layouts.template')
@section('content')
    <!-- all post -->
    <section class="mt-50">
        <div class="container-fluid">
            <div class="row g-3">
                <!-- SINGLE POST -->
                @forelse ($searchresutl as $post)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-post text-center">
                            <div>
                                <img src="{{ asset($post->post_image) }}" class=" img-fluid" alt="post image">
                            </div>
                            <div class="wrapper p-3">
                                <div class="link">
                                    <a class="post-link"
                                        href="{{ route('singleblog', ['id' => $post->id]) }}">{{ $post->post_tittle }}</a>
                                </div>
                                <div class="authorinfo">
                                    <ul class=" list-inline">
                                        <li class=" list-inline-item"><img src="{{ asset($post->users->image) }}"
                                                class="authorimage img-fluid" alt="post author image"></li>
                                        <li class=" list-inline-item"><span>{{ $post->users->name }}
                                            </span></li>
                                        <li class=" list-inline-item">
                                            <p>{{ $post->categories->category_name }}
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                                <p>{{ $post->post_descriptions }}</p>
                                <div class="d-fle align-items-center post-read">
                                    <a href="{{ route('singleblog', ['id' => $post->id]) }}">Read More</a>
                                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="text-danger">no post found</div>
                @endforelse
                <!-- SINGLE POST END -->
                <div class="row">
                    <div class="col-6 mx-auto">
                        {{ $searchresutl->links('pagination::bootstrap-5') }}
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- all post end -->

    <!-- pagination -->
    {{-- <div class="container text-center simplepagination my-5 w-100">
        <center class="text-center w-100">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled rounded-0">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">2</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </center>
    </div> --}}
    <!-- pagination end -->
@endsection
