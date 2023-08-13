


<div class="mobile-header">
  <div class="large-container">
    <div class="header__inner">
      <div class="mobileHeader__logoGroup">
        <a class="mobileHeader__logo" href="{{ home_url('/') }}">
          <img src="{!! $header['logo']['url'] !!}"  alt="{!! $header['logo']['alt'] !!}" class="logo">
        </a>
      </div>


      <div class="mobileHeader__buttonGroup">
        <button class="mobileHeader__button">
          <div class="mobileHeader__button-toggle" data-module="mobile-menu">
            <span class="mobileHeader__button-toggle-line"></span>
            <span class="mobileHeader__button-toggle-line"></span>
            <span class="mobileHeader__button-toggle-line"></span>
          </div>
        </button>
      </div>

    </div>
  </div>
</div>






{{-- <aside class="mobile-menu">

  <div class="inner">

    <div class="top">

      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>

    </div>

    <div class="bottom">

      <a href="/get-started" class="button button-small">
        Get Started
      </a>

      <nav class="header-icons">
        <button class="header-icon locales">
          @svg('icon-locale.svg')
        </button>

        <button class="header-icon search" data-module="header-search">
          @svg('icon-search.svg')

          <div class="click-area fill"></div>

          <div class="search-form-container">
            <form role="search" method="get" class="search-form" action="/">
              <label>
                <input 
                  type="search" 
                  class="search-field" 
                  placeholder="Search..." 
                  name="s"
                >
              </label>
            </form>
          </div>
        </button>

        <a class="header-icon account" href="/my-account">
          @svg('icon-account.svg')
        </a>
      </nav>

    </div>

  </div>

</aside> --}}
