@php
  $title = get_sub_field('title');
  $imageGallery = get_sub_field('image_gallery');
  $descriptionGroup = get_sub_field('add_description');
  $button = get_sub_field('button');
@endphp


<div class="galleryTextSection" data-header-state='normal'>
    <div class="container galleryTextSection__content">
        <div class="galleryTextSection__text-section">
          @if ($title)
              <div class="galleryTextSection__title-section">
                <h3 class="galleryTextSection__title headline">{{ $title }}</h3>
              </div>
          @endif
          @if ($descriptionGroup)
              <div class="galleryTextSection__descriptionGroup">
                  @foreach ($descriptionGroup as $description)
                  <p class="galleryTextSection__paragraph">{{ $description['description'] }}</p>
                  @endforeach
              </div>
          @endif

          @if ($button)
              <div class="galleryTextSection__text-button">
                  @component('components.button', [
                  'button' => $button,
                  'classes' => 'galleryTextSection__button'
                  ])
                  @endcomponent
              </div>
          @endif
        </div>
        <div class="galleryTextSection__image-section">
          @if ($imageGallery)
            @foreach ($imageGallery as $key => $image)
              <div class="galleryTextSection__image galleryTextSection__image--{{ $key }}">
                @component('components.image', [
                  'image' => $image,
                  'lazyload' => true,
                  'classes' => 'galleryTextSection__image'
                ])
                @endcomponent
              </div>
            @endforeach
          @endif
        </div>
     </div>
</div>