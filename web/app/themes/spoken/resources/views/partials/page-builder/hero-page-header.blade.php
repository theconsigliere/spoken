@php
    $title = get_sub_field('title');
    $image = get_sub_field('background_image');
    $description = get_sub_field('description');
    $button = get_sub_field('button');
@endphp

<section class="hero__page-header" data-module="hero-page-header" data-header-state='transparent'>
    @if ($image)
    <div class="hero__page-header-image js-image-group" >
        @component('components.image', [
        'image' => $image,
        'lazyload' => true,
        'classes' => 'js-image'
        ])
        @endcomponent
    </div>
    @endif


    <div class="hero__page-header-content">

        @if ($title)
        <h1 class='hero__page-header-title headline js-title'>
          {{ $title }}
        </h1>
      @endif

        @if ($description)
        <p class='hero__page-header-description js-desc'>
          {{ $description }}
        </p>
      @endif

      @if ($button)
      <div class='hero__page-header-buttonGroup'>
        @component('components.button', [
          'button' => $button,
          'classes' => 'hero__main-button btn--transparent js-button'
        ])
        @endcomponent
      </div>
    @endif

    </div>

    <div class="hero__page-header-pattern">
        @svg('svg.footer-pattern')
    </div>

</section>