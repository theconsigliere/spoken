
<aside class="mobileMenu js-mobile-menu">
    <div class="mobileMenu__inner">

        @if ($header['mobile_menu'])

        @component('components.mobile-nav', [
            'menu' => $header['mobile_menu'],
            'classes' => 'mobileMenu'
          ])
      @endcomponent
    @endif  

    </div>
</aside>