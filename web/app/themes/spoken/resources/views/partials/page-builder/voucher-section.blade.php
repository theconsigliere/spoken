@php
    $title = get_sub_field('title');
    $backgroundImage = get_sub_field('background_image');
    $image = get_sub_field('image');
    $descriptionGroup = get_sub_field('add_description');
    $button = get_sub_field('button');
@endphp


<div class="voucher" data-module="voucher">

  <div class="voucher__container">
    @if ($backgroundImage)
    <div class="voucher__background-imageGroup js-image-group">
        @component('components.image', 
        ['image' => $backgroundImage, 
        'class' => 'voucher__background-image'])
        @endcomponent
    </div>
    @endif


    <div class="voucher__bottom">
        <div class="container">
            <div class="voucher__content">
                <div class="voucher__content-inner">
                    @if ($title)
                    <div class="voucher__content-titleGroup">
                        <h3 class='voucher__content-title headline'>{{ $title }}</h3>
                    </div>
                @endif
    
                @if ($image)
                    <div class="voucher__content__imageGroup">
                        @component('components.image', 
                        ['image' => $image, 
                        'class' => 'voucher__content__image'])
                        @endcomponent
                    </div> 
                @endif
        
                @if ($button)
                <div class="voucher__content-button">
                        @component('components.button', [
                            'button' => $button,
                            'classes' => 'btn--block voucher__button'
                        ])
                        @endcomponent
                    </div>
                @endif
              
                @if ($descriptionGroup)
                <div class="voucher__content-descriptionGroup">
                    <div class="voucher__divider">
                        @svg('svg.wavy-line')
                    </div>
                        <div class="voucher__content-text">
                            @foreach ($descriptionGroup as $description)
                            <p>{{ $description['description'] }}</p>
                        @endforeach
                        </div>
                    <div class="voucher__divider">
                        @svg('svg.wavy-line')
                    </div>
                </div>
                @endif

                <div class="voucher__content-logo">
                    @component('components.logo-spinner', [
                        'size' => 'medium',
                        'classes' => '',
                    ])
                    @endcomponent
                </div>
                </div>
            </div>
        </div>
    </div>

  </div>

</div>