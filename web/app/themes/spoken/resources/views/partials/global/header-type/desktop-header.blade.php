<div class="desktop-header">
    <div class="large-container ">
        <div class="header__inner">      
            @if ($header['desktopMenuOne'])
                @component('components.nav', [
                    'menu' => $header['desktopMenuOne'],
                    'classes' => 'header__nav'
                  ])
              @endcomponent
            @endif

            <div class="header__logoGroup">
              <a class="header__logo" href="{{ home_url('/') }}">
                <img src="{!! $header['logo']['url'] !!}"  alt="{!! $header['logo']['alt'] !!}" class="logo">
              </a>
            </div>
            
            @if ($header['desktopMenuTwo'])
                @component('components.nav', [
                    'menu' => $header['desktopMenuTwo'],
                    'classes' => 'header__nav'
                  ])
              @endcomponent
            @endif   
        </div>
    </div>
</div>