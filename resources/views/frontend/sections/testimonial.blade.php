<section class="testimonial-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $feedbackTitle->title ?? 'Client Testimonials' }}</h3>
                    <div class="desc">
                        <p>{{ $feedbackTitle->sub_title ?? 'Here is what our clients say about us.' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="testimonial-slider">
                    @foreach($feedbacks as $feedback)
                        <div class="single-testimonial">
                            <div class="testimonial-header">
                                <div class="quote" aria-label="Quote Icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <h5 class="title">{{ $feedback->name ?? 'Anonymous' }}</h5>
                                <h6 class="position">{{ $feedback->position ?? 'Position not provided' }}</h6>
                            </div>
                            <div class="content">
                                <p>{!! $feedback->description ?? 'No feedback provided.' !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
