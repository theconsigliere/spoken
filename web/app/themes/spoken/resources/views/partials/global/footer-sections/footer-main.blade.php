<div class="footer__main">
    <div class="container">

            @if ($openingTimes)

                <div class="footer__main-opening-times">
                    @if ($openingTimes['title'])
                    <div class="footer__main-titleGroup">
                        <h6 class="footer__main-title sub-headline">
                            {{ $openingTimes['title'] }}
                        </h6>
                    </div>
                    @endif

                    @if ($openingTimes['add_open_hours'])


                        <div class="footer__main-openHours">
                            @foreach ($openingTimes['add_open_hours'] as $times)

                                <div class="footer__hours">
                                    @if ($times['day'])
                                    <h6 class="footer__openHours-day sub-headline">{{ $times['day'] }}</h6>
                                    @endif

                                    @if ($times['hours'])
                                    <p class="footer__openHours-hours sub-headline">{{ $times['hours'] }}</p>
                                    @endif

                                    <div class="footer__underline"></div>
                                </div>
                             @endforeach
                            
                        </div>
                        
                    
                    @endif
                </div>
            
            @endif


            @if ($contactDetails)

            <div class="footer__main-contactDetails">
                @if ($contactDetails['title'])
                <div class="footer__main-titleGroup">
                    <h6 class="footer__main-title sub-headline">
                        {{ $contactDetails['title'] }}
                    </h6>
                </div>
                @endif

                @if ($contactDetails['add_contact_details'])
                    <div class="footer__main-detail">
                        @foreach ($contactDetails['add_contact_details'] as $details)
                        <div class="footer__detail">
                            <a href="{{ $details['contact_detail']['url'] }}" class="sub-headline p footer__detail-link" target="{{ $details['contact_detail']['target'] }}" >{{ $details['contact_detail']['title'] }}</a>
                            <div class="footer__underline"></div>
                        </div>

                        @endforeach
                    </div>

                @endif
            </div>

            @endif


            @if ($footer['map_image'])

                <div class="footer__main-mapGroup">
                    @component('components.image', [
                        'image' => $footer['map_image'],
                        'lazyload' => true,
                        'classes' => 'footer__main-map'
                        ])
                    @endcomponent
                </div>
                                  
            @endif

            <div class="footer__svg">
                @svg('svg.footer-pattern')
            </div>
        </div>
        
</div>