@php
$imagePosition = get_sub_field('image_position');
$backgroundColour = get_sub_field('background_colour');
$pattern = get_sub_field('add_pattern');
$cropImage = get_sub_field('crop_image');
$descriptionGroup = get_sub_field('add_description');
$button = get_sub_field('button');
$image = get_sub_field('image');
$title = get_sub_field('title');
@endphp


<div class="imageSideTextSide imageSideTextSide--{{ $imagePosition }}" style="background: {{ $backgroundColour }}" data-header-state='normal'>
    <div class="imageSideTextSide__image">
       <div class="imageSideTextSide__image--{{ $cropImage }}">
        @component('components.image', [
        'image' => $image,
        'lazyload' => true,
        'classes' => '',
        ])
        @endcomponent
    </div>
    </div>
    <div class="imageSideTextSide__text">
        <div class="imageSideTextSide__text-inner">
                <div class="imageSideTextSide__text-content">
                @if ($title)
                    <h3 class="imageSideTextSide__title h4 headline">{{ $title }}</h3>
                @endif
                @if ($descriptionGroup)
                    <div class="imageSideTextSide__descriptionGroup">
                        @foreach ($descriptionGroup as $description)
                        <p class="imageSideTextSide__paragraph">{{ $description['description'] }}</p>
                        @endforeach
                    </div>
                @endif
    
                @if ($button)
                    <div class="imageSideTextSide__text-button">
                        @component('components.button', [
                        'button' => $button,
                        'classes' => 'imageSideTextSide__button'
                        ])
                        @endcomponent
                    </div>
                @endif
                </div>

            @if ($pattern === 'wavy')
            <div class="imageSideTextSide__pattern">
                @svg('svg.wave-pattern') 
            </div>
            @elseif ($pattern === 'dot')
            <div class="imageSideTextSide__pattern">
                @svg('svg.dot-pattern') 
            </div>       
            @else
            @endif
        </div>
             
    </div>
</div>