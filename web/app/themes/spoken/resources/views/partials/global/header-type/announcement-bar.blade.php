@if ($announcementBar['show_announcement_bar'] === 'show')
<div class="announcementBar">
    <div class="large-container">
        <a class="announcementBar__link" href="{{ $announcementBar['link']['url']}}" target={{ $announcementBar['link']['target']}} >
            {!! $announcementBar['textarea'] !!}
        </a>
    </div>
</div>

@endif