@php
  $title = get_sub_field('add_title');
  $imageGallery = get_sub_field('image_gallery');
  $descriptionGroup = get_sub_field('add_description');
  $button = get_sub_field('button');
@endphp

<section class="introSection">

  <div class="container">

    <div class="introSection__inner">

      <div class="introSection__spoken-circle">
        <div class="introSection__spoken-circle--circle">
          @svg('svg.spoken-circle')
        </div>
      </div>


      @if ($title)
        <div class='introSection__titleGroup'>
         <h2 class='introSection__title h3 headline'>
           @foreach ($title as $titleText)
             <span class='introSection__span'>{{ $titleText['title'] }}</span>
           @endforeach
          </h2>
       </div>
      @endif

    </div>

    <div class="introSection__content">
      <div class="introSection__image-content">
        @if ($imageGallery)
          @foreach ($imageGallery as $key => $image)
            <div class="introSection__image--{{ $key }}">
              @component('components.image', [
                'image' => $image,
                'lazyload' => true,
                'classes' => 'introSection__image'
              ])
              @endcomponent
            </div>
          @endforeach
        @endif
      </div>
      <div class="introSection__text-content">
        @if ($descriptionGroup)
          @foreach ($descriptionGroup as $description)
            <p class="introSection__text-content-paragraph">{{ $description['description'] }}</p>
          @endforeach
        @endif

        @component('components.button', [
          'button' => $button,
          'classes' => 'introSection__text-content-button'
        ])
        @endcomponent
      </div>
    </div>

  
  </div>


</section>