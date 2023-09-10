@php
    $image = get_sub_field('image');
    $buttonRepeater = get_sub_field('contact_buttons');
@endphp



{{-- Pulls opening itmes & contact details from app.php --}}


<div class="contact" data-header-state='normal'>
    <div class="contact__inner">
        <div class="contact__item">

                <div class="contact__item-inner">

        @if ($openingTimes)

        <div class="contact__opening-times">
            @if ($openingTimes['title'])
            <div class="footer__main-titleGroup">
                <h6 class="footer__main-title sub-headline">
                    {{ $openingTimes['title'] }}
                </h6>
            </div>
            @endif

            @if ($openingTimes['add_open_hours'])


                <div class="contact__main-openHours">
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

    <div class="contact__contactDetails">
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

    @if ($buttonRepeater)
        <div class="contact__buttons">
            @foreach ($buttonRepeater as $button)
                @component('components.button', [
                    'button' => $button['button'],
                    'classes' => 'btn--block'
                ])
                @endcomponent
            @endforeach
        </div>
    @endif
                </div>

        </div>
        <div class="contact__item">
            @component('components.image', [
                'image' => $image,
                'lazyload' => true,
                'classes' => 'contact__image'
              ])
              @endcomponent
        </div>
    </div>
</div>