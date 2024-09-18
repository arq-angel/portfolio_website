@extends("frontend.layouts.layout")

@section("content")
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">Blog Details</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Blog-Details-Area-Start -->
    <section class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="head-title">{{ $blog->title ?? 'No Title Available' }}</h2>
                    <div class="blog-meta">
                        <div class="single-meta">
                            <div class="meta-title">Published</div>
                            <h4 class="meta-value"><a href="javascript:void(0)">
                                    {{ $blog->created_at ? date('d M, Y', strtotime($blog->created_at)) : 'Unknown' }}
                                </a></h4>
                        </div>
                        <div class="single-meta">
                            <div class="meta-title">Category</div>
                            <h4 class="meta-value">
                                <a href="javascript:void(0)">
                                    {{ $blog->getCategory->name ?? 'Uncategorized' }}
                                </a>
                            </h4>
                        </div>
                    </div>
                    <figure class="image-block">
                        <img class="img-fix" src="{{ $blog->image ? asset($blog->image) : asset('default-blog-image.jpg') }}" alt="{{ $blog->title ?? 'Blog Image' }}">
                    </figure>
                    <div class="description">
                        {!! $blog->description ?? 'No description available.' !!}
                    </div>
                    <div class="single-navigation">
                        @if($previousPost)
                            <a href="{{ route('show.blog', $previousPost->id) }}" class="nav-link">
                                <span class="icon"><i class="fal fa-angle-left"></i></span>
                                <span class="text">{{ $previousPost->title }}</span>
                            </a>
                        @endif
                        @if($nextPost)
                            <a href="{{ route('show.blog', $nextPost->id) }}" class="nav-link">
                                <span class="text">{{ $nextPost->title }}</span>
                                <span class="icon"><i class="fal fa-angle-right"></i></span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog-Details-Area-End -->

    <!-- Quote-Area-Start -->
    <section class="quote-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="quote-box">
                        <div class="row ">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="quote-content">
                                    <h3 class="title">Your Journey Today</h3>
                                    <div class="desc">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate rem maiores, neque at officiis laudantium.</p>
                                    </div>
                                    <a href="#" class="button-orange mouse-dir">Get Started <span class="dir-part"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Quote-Area-End -->
@endsection
