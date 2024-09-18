@extends("frontend.layouts.layout")

@section("content")
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">Portfolio Details</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio-Area-Start -->
    <section class="portfolio-details section-padding" id="portfolio-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="head-title">{{ $portfolio->title ?? 'No Title Available' }}</h2>
                    <figure class="image-block">
                        <img src="{{ $portfolio->image ? asset($portfolio->image) : asset('default-portfolio-image.jpg') }}" alt="{{ $portfolio->title ?? 'Portfolio Image' }}" class="img-fix">
                    </figure>
                    <div class="portfolio-info">
                        <div class="single-info">
                            <h4 class="title">Client</h4>
                            <p>{{ $portfolio->client ?? 'Unknown Client' }}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Date</h4>
                            <p>{{ $portfolio->created_at ? date('d, M, Y', strtotime($portfolio->created_at)) : 'Unknown Date' }}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Website</h4>
                            <p><a href="{{ $portfolio->website ?? 'javascript:void(0)' }}">{{ $portfolio->website ?? 'No website available' }}</a></p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Category</h4>
                            <p>{{ $portfolio->category->name ?? 'Uncategorized' }}</p>
                        </div>
                    </div>
                    <div class="description">
                        {!! $portfolio->description ?? 'No description available.' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->

    <!-- Quote-Area-Start -->
    <section class="quote-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="quote-box">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="quote-content">
                                    <h3 class="title">Your Journey Today</h3>
                                    <div class="desc">
                                        <p>Still top of and the drops. What don't issued character god, no ports, credit question.</p>
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
