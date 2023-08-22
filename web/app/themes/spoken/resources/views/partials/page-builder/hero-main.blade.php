@php
  $title = get_sub_field('add_title');
  $image = get_sub_field('background_image');
  $description = get_sub_field('description');
  $button = get_sub_field('button');
  $showEmbed = get_sub_field('show_embed');
@endphp


<section class="hero__main" data-module='hero-main'>

  @if ($image)
  <div class="hero__main-image js-image-group" data-parallax-media>
      @component('components.image', [
      'image' => $image,
      'lazyload' => true,
      'classes' => 'js-image'
      ])
      @endcomponent
  </div>
  @endif


    <div class="hero__main-titleSection">

      <div class="hero__main-logo">
        @component('components.logo-spinner', [
          'size' => 'large',
          'classes' => 'hero__main'
      ])
      @endcomponent
      </div>

      @if ($title)
        <div class='hero__main-titleGroup'>
         <h1 class='hero__main-title js-title'>
           @foreach ($title as $titleText)
             <span class='hero__main-span'>{{ $titleText['title'] }}</span>
           @endforeach
          </h1>
       </div>
      @endif

      @if ($description)
        <p class='hero__main-description js-desc'>
          {{ $description }}
        </p>
      @endif

      @if ($button)
        <div class='hero__main-buttonGroup'>
          @component('components.button', [
            'button' => $button,
            'classes' => 'hero__main-button btn--transparent js-button'
          ])
          @endcomponent
        </div>
      @endif

    </div>

    @if ($showEmbed === 'show')
    <div class="hero__main-embed">
      {!! $opentableEmbed['embed'] !!}
    </div>
    @endif


</section>