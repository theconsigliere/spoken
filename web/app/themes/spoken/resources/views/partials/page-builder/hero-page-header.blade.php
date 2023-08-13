@php
    $title = get_sub_field('title');
    $image = get_sub_field('background_image');
    $description = get_sub_field('description');
    $button = get_sub_field('button');
@endphp

<section class="hero__page-header">
    @if ($image)
    <div class="hero__page-header-image" >
        @component('components.image', [
        'image' => $image,
        'lazyload' => true
        ])
        @endcomponent
    </div>
    @endif


    <div class="hero__page-header-content">

        @if ($title)
        <h1 class='hero__page-header-title headline'>
          {{ $title }}
        </h1>
      @endif

        @if ($description)
        <p class='hero__page-header-description'>
          {{ $description }}
        </p>
      @endif

      @if ($button)
      <div class='hero__page-header-buttonGroup'>
        @component('components.button', [
          'button' => $button,
          'classes' => 'hero__main-button btn--transparent'
        ])
        @endcomponent
      </div>
    @endif

    </div>

    <div class="hero__page-header-pattern">
        @svg('svg.footer-pattern')
    </div>

</section>