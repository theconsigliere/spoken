@include('partials.global.head')

<body <?php body_class(); ?>>
  @include('scripts.gtm')

  <?php wp_body_open(); ?>
  <?php do_action('get_header'); ?>
  @include('partials.global.preloader')
  @include('partials.global.privacy-policy-banner')
  @include('partials.global.header')
  <div id="website">
    <div class="page__fader js-page-fader"></div>

    <main id="main" class="main">
      @yield('content')
    </main>

    @include('partials.global.footer')
  </div>

  <?php do_action('get_footer'); ?>
  <?php wp_footer(); ?>

  @if ($_SERVER['WP_ENV'] == 'development')
      @include('components.debugger')
  @endif

{{-- @if ($_SERVER['WP_ENV'] == 'staging')
  <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=npp0ol6ocqgebz5ugbf2qw" async="true">
  </script>
@endif --}}


  {{-- @include('scripts.devtools') --}}
</body>
