<section class="experience-area section-padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image wow fadeInLeft">
                    <img
                        src="{{ $experience && $experience->image ? asset($experience->image) : asset('uploads/default/default-picture.webp') }}"
                        alt="{{ $experience->title ?? 'Experience Image' }}">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="experience-text">
                    <h3 class="title wow fadeInUp" data-wow-delay="0.3s">{{ $experience->title ?? 'Experience' }}</h3>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        {!! $experience && $experience->description ? $experience->description : 'No description available at the moment.' !!}
                    </div>
                    <div class="row">
                        @if(isset($experience->phone))
                            <div class="col-sm-6">
                                <div class="icon-info wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="icon"><i class="fas fa-mobile-android-alt"></i></div>
                                    <h6>
                                        <a href="tel:{{ $experience->phone ?? '#' }}"
                                           class="text">{{ $experience->phone ?? 'No phone number available' }}</a>
                                    </h6>
                                </div>
                            </div>
                        @endif
                        @if(isset($experience->email))
                            <div class="col-sm-6">
                                <div class="icon-info wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="icon"><i class="fas fa-envelope"></i></div>
                                    <h6>
                                        <a href="mailto:{{ $experience->email ?? '#' }}"
                                           class="text">{{ $experience->email ?? 'No email available' }}</a>
                                    </h6>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
