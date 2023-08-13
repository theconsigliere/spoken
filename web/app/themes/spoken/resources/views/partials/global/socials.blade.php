
<div class="socials__group">
    @if ($socials['facebook_link'])
        <a href="{{ $socials['facebook_link'] }}" target="new" class="social__link">
            @svg('svg.fb')
        </a>
    @endif

    @if ($socials['twitter_link'])
        <a href="{{ $socials['twitter_link'] }}" target="new" class="social__link">
            @svg('svg.twitter')
        </a>
    @endif

    @if ($socials['instagram_link'])
        <a href="{{ $socials['instagram_link'] }}" target="new" class="social__link">
            @svg('svg.insta')
        </a>
    @endif

    @if ($socials['linkedin_link'])
        <a href="{{ $socials['linkedin_link'] }}" target="new" class="social__link">
            @svg('svg.linkedin')
        </a>
    @endif
</div>