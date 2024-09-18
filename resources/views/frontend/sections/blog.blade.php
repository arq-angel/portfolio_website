<section class="blog-area section-padding-top" id="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $blogTitle->title ?? 'Latest Blogs' }}</h3>
                    <div class="desc">
                        <p>{!! $blogTitle->sub_title ?? 'Stay updated with our latest news and articles.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-slider">
                    @foreach($blogs as $blog)
                        <div class="single-blog">
                            <figure class="blog-image">
                                <img src="{{ $blog->image ? asset($blog->image) : asset('uploads/default/default-picture.webp') }}" alt="{{ $blog->title ?? 'Blog Image' }}">
                            </figure>
                            <div class="blog-content">
                                <h3 class="title"><a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title ?? 'No Title' }}</a></h3>
                                <div class="desc">
                                    <p>{!! Str::limit(strip_tags($blog->description ?? 'No description available.'), 200, '...') !!}</p>
                                </div>
                                <a href="{{ route('show.blog', $blog->id) }}" class="button-primary-trans mouse-dir">Read More <span
                                        class="dir-part"></span> <i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
