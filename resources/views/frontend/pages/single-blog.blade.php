@extends('frontend.layouts.template')
@section('content')
    <section class="mt-45 mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-view-post">
                        <img src="{{ asset($singlepost->post_image) }}" class=" img-fluid" alt="">
                        <div class="profile-view p-3 p-lg-5">
                            <h3 class="my-1">{{ $singlepost->post_tittle }}
                            </h3>
                            <div class=" profile-info my-3">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><img src="{{ asset($singlepost->users->image) }}"
                                            class="  img-fluid" alt=""></li>
                                    <li class="list-inline-item">
                                        <span>{{ $singlepost->users->name }}</span>
                                    </li>
                                    <li class="list-inline-item"><span>{{ $singlepost->categories->category_name }}</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>{{ $singlepost->created_at->format('M d ,Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <p>
                                {{ $singlepost->post_descriptions }}
                            </p>

                            <div class="profile d-flex flex-sm-row flex-column">
                                <div>
                                    <img src="{{ asset($singlepost->users->image) }}" class=" img-fluid"
                                        alt="">
                                </div>
                                <div class="ms-3">
                                    <h4 class="name">{{ $singlepost->users->name }}</h4>
                                    <p class="details">{{ $singlepost->users->email }}</p>
                                    <div class="profile-media">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href=""><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href=""><i
                                                        class="fa-brands fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href=""><i
                                                        class="fa-brands fa-linkedin-in"></i></a></li>
                                            <li class="list-inline-item"><a href=""><i
                                                        class="fa-brands fa-square-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- related post -->
    <section class="mt-50 mb-50">
        <div class="container">
            <h4 class="mb-3">Related Post</h4>
            <div class="row g-3">

                <!-- SINGLE-view-related POST -->
            @forelse ($relatedposts as $relatedpost)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-post text-center">
                            <div>
                                <img src="{{ asset($relatedpost->post_image) }}" class=" img-fluid" alt="post image">
                            </div>
                            <div class="wrapper p-3">
                                <div class="link">
                                    <a class="post-link" href="">{{ $relatedpost->post_tittle }}</a>
                                </div>
                                <div class="authorinfo">
                                    <ul class=" list-inline">
                                        <li class=" list-inline-item"><img src="{{ asset($relatedpost->users->image) }}"
                                                class="authorimage img-fluid" alt="post author image"></li>
                                        <li class=" list-inline-item"><span>{{ $relatedpost->users->name }}
                                            </span></li>
                                        <li class=" list-inline-item">
                                            <p>{{ $relatedpost->categories->category_name }}
                                            </p>

                                        </li>

                                    </ul>
                                </div>
                                <p>{{ $relatedpost->post_tittle }}</p>
                                <div class="d-fle align-items-center post-read">
                                    <a href="{{ route('singleblog',['id'=>$relatedpost->id]) }}">Read More</a>
                                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            @empty

            @endforelse
                <!-- SINGLE-view-related POST END -->



            </div>
        </div>
    </section>
    <!-- related post end -->
@endsection
