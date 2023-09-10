@php
    $selectBreakdown = get_sub_field('show_breakdown');
    $descriptionGroup = get_sub_field('add_description');
    $backgroundColour = get_sub_field('background_colour');
    $title = get_sub_field('title');
    $image = get_sub_field('background_image');
@endphp



<div class="fullWidthImageBreakdown" data-header-state='normal'>
    @if ($selectBreakdown === 'show')    
        <div class="breakdown" style="background: {{ $backgroundColour }}">
            <div class="container">
            <div class="breakdown__inner">
                            @if ($title)
                            <div class="breakdown__item">
                                <h4 class="breakdown__title headline">{{ $title }}</h4>
                            </div>
                        @endif

                        @if ($descriptionGroup)
                            @foreach ($descriptionGroup as $description)
                                <div class="breakdown__item">
                                    <p class="breakdown__paragraph">{{ $description['description'] }}</p>
                                </div>
                            @endforeach
                        @endif
            </div>
        </div>
        </div>
    @endif

    <div class="fullWidthImage">
        @if ($selectBreakdown !== 'show')    
            <div class="fullWidthImage__pattern">
                @svg('svg.green-dot-pattern')
            </div>
        @endif

        @component('components.image', [
          'image' => $image,
          'lazyload' => true,
          'classes' => 'fullWidthImage__image'
        ])
        @endcomponent
    </div>


</div>