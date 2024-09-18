@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();
@endphp

<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{ $generalSetting && $generalSetting->footer_logo ? asset($generalSetting->footer_logo) : asset('uploads/default/default-picture.webp') }}" alt="">
                    </figure>
                    <p>{{ $footerInfo ? $footerInfo->info : 'Default Footer Info' }}</p>
                    <ul class="d-flex flex-wrap">
                        @if($footerIcons->isNotEmpty())
                            @foreach($footerIcons as $icon)
                                <li><a href="{{ $icon->url }}" target="_blank"><i class="{{ $icon->icon }}"></i></a></li>
                            @endforeach
                        @else
                            <li>No Social Links Available</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Links</h3>
                <ul class="nav-menu">
                    @if($footerUsefulLinks->isNotEmpty())
                        @foreach($footerUsefulLinks as $usefulLink)
                            <li><a href="{{ $usefulLink->url }}">{{ $usefulLink->name }}</a></li>
                        @endforeach
                    @else
                        <li>No Useful Links Available</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    @if($footerContact)
                        <li>{{ $footerContact->address }}</li>
                        <li><a href="tel:{{ $footerContact->phone }}">{{ $footerContact->phone }}</a></li>
                        <li><a href="mailto:{{ $footerContact->email }}">{{ $footerContact->email }}</a></li>
                    @else
                        <li>No Contact Information Available</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @if($footerHelpLinks->isNotEmpty())
                        @foreach($footerHelpLinks as $footerHelpLink)
                            <li><a href="{{ $footerHelpLink->url }}" target="_blank">{{ $footerHelpLink->name }}</a></li>
                        @endforeach
                    @else
                        <li>No Help Links Available</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{ $footerInfo ? $footerInfo->copy_right : 'Default Copyright Text' }}</p>
                        <p>{{ $footerInfo ? $footerInfo->powered_by : 'Default Powered By Text' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
