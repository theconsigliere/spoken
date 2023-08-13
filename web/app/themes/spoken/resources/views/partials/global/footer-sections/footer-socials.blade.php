<section class="footer__socials">
    <div class="container">
        <div class="footer__socialsGroup">
            @if ($socials['facebook_link'])
                <a href="{{ $socials['facebook_link']['url'] }}" target="new" class="social__link">
                    @svg('svg.fb-logo')
                    <p class="social__link-text headline">
                        {{ $socials['facebook_link']['title'] }}
                    </p>
                </a>
            @endif
        
            @if ($socials['twitter_link'])
                <a href="{{ $socials['twitter_link']['url'] }}" target="new" class="social__link">
                    @svg('svg.twitter-logo')
                    <p class="social__link-text headline">
                        {{ $socials['twitter_link']['title'] }}
                    </p>
                </a>
            @endif
        
            @if ($socials['instagram_link'])
                <a href="{{ $socials['instagram_link']['url'] }}" target="new" class="social__link">
                    @svg('svg.instagram-logo')
                    <p class="social__link-text headline">
                        {{ $socials['instagram_link']['title'] }}
                    </p>
                </a>
            @endif
        
            @if ($socials['linkedin_link'])
                <a href="{{ $socials['linkedin_link']['url'] }}" target="new" class="social__link">
                    @svg('svg.linkedin')
                    <p class="social__link-text headline">
                        {{ $socials['linkedin_link']['title'] }}
                    </p>
                </a>
            @endif
        </div>
    </div>
</section>