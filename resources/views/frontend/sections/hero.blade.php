<header class="header-area parallax-bg" id="home-page" style="background: url('{{ $hero && $hero->image ? asset($hero->image) : asset('uploads/default/default-picture.webp') }}') no-repeat scroll top center/cover">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-text">
                    <h3 class="typer-title wow fadeInUp" data-wow-delay="0.2s">{{ $hero->typer_title ?? "I'm a UI/UX Designer" }}</h3>
                    <h1 class="title wow fadeInUp" data-wow-delay="0.3s">{{ $hero->title ?? 'Default Hero Title' }}</h1>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        <p>{{ $hero->sub_title ?? 'Default subtitle text.' }}</p>
                    </div>
                    @if($hero && $hero->btn_text)
                        <a href="{{ $hero->btn_url ?? '#' }}" class="button-dark mouse-dir wow fadeInUp" data-wow-delay="0.5s">{{ $hero->btn_text }}<span class="dir-part"></span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

@push("scripts")
    <script>
        @php
            $titles = [];
            foreach($typerTitles as $title) {
                $titles[] =$title->title;
            }

            $titles = json_encode($titles);
        @endphp
        $('.header-area .typer-title').typer({!! $titles !!});
    </script>
@endpush

