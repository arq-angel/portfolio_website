<section class="skills-area section-padding-top" id="skills-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h3 class="title">{{ $skill->title ?? 'Skills' }}</h3>
                            <div class="desc">
                                <p>{!! $skill->sub_title ?? 'A summary of my skills and expertise.' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row skills">
                    @foreach($skillItems as $item)
                        <div class="col-sm-6">
                            <div class="bar_group wow fadeInUp" data-wow-delay="0.3s" data-max="100">
                                <div class="title">{{ $item->name ?? 'Skill' }}</div>
                                <div class="bar_group__bar thick elastic"
                                     data-value="{{ $item->percent ?? 0 }}"
                                     data-color="{{ getColor($loop->index) ?? '#000' }}"
                                     data-tooltip="true" data-show-values="false" data-unit="%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image text-right wow fadeInRight">
                    <img src="{{ (isset($skill) && $skill->image) ? asset($skill->image) : asset('uploads/default/default-picture.webp') }}" alt="{{ $skill->title ?? 'Skill Image' }}">
                </figure>
            </div>
        </div>
    </div>
</section>
