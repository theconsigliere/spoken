<section class="footer__gallery" data-module="footer-gallery">
    <div class="footer__gallery-inner">
        @if ($footer['footer_gallery'])
        <div class="swiper js-swiper">
          <div class="swiper-wrapper">
        @foreach ($footer['footer_gallery'] as $key => $image)
        <div class="swiper-slide">
        
            @component('components.image', [
              'image' => $image,
              'lazyload' => true,
              'classes' => 'footerGallery__image'
            ])
            @endcomponent
        
        </div>
        @endforeach
      </div>
    </div>
      @endif
    </div>
</section>