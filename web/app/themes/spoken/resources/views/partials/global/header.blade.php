
<header class="header js-header">
    {{-- Announcement bar --}}
    @include('partials.global.header-type.announcement-bar')
    
  <div class="header__background"></div>
  {{-- Desktop Header --}}
  @include('partials.global.header-type.desktop-header')

  {{-- Mobile Header --}}
  @include('partials.global.header-type.mobile-header')

</header>
  {{-- Mobile Slide out Menu --}}
  @include('partials.global.header-type.mobile-menu')
