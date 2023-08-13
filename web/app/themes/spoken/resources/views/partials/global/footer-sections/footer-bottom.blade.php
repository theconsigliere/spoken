@php
    $date = date('Y');
@endphp

<div class="footer__bottom">
    <div class="footer__bottom-container">

        <div class="footer__bottom-links">
            <div class="footer__bottom-links-inner">
                @if ($footer['add_legal_links'])
                @foreach ($footer['add_legal_links'] as $link)
                    <a href="{{ $link['legal_link']['url'] }}" class="footer__bottom-link headline" target="{{ $link['legal_link']['target'] }}">{{ $link['legal_link']['title'] }}</a>
                @endforeach
            @endif
            </div>
        </div>

        <div class="footer__bottom-logoGroup">
            @component('components.logo-spinner', [
                'size' => 'medium',
                'classes' => 'footer-bottom',
                'color' => 'white'
            ])
            @endcomponent
        </div>


          <div class="footer__bottom-socials">
                <div class="footer__bottom-socials-inner">
                    @if ($socials['facebook_link'])
                    <a href="{{ $socials['facebook_link']['url'] }}" target="new" class="footer-social__link">
                        @svg('svg.fb-logo')
                    </a>
                @endif

                @if ($socials['twitter_link'])
                    <a href="{{ $socials['twitter_link']['url'] }}" target="new" class="footer-social__link">
                        @svg('svg.twitter-logo')
                    </a>
                @endif

                @if ($socials['instagram_link'])
                    <a href="{{ $socials['instagram_link']['url'] }}" target="new" class="footer-social__link">
                        @svg('svg.instagram-logo')
                    </a>
                @endif

                @if ($socials['linkedin_link'])
                    <a href="{{ $socials['linkedin_link']['url'] }}" target="new" class="footer-social__link">
                        @svg('svg.linkedin')
                    </a>
                @endif
                </div>

          </div>

    </div>

    <div class="container">
        <p class="footer__copyright">
          {{ $siteName }} All Rights Reserved {{ $date }}. <a href="https://maxwellkirwin.co.uk" target="new">Website developed by Maxwell Kirwin</a>
        </p>
    </div>
</div>
