@php
    $title = get_sub_field('title');
    $menuRepeater = get_sub_field('add_menu');

@endphp

<div class="menu">
    <div class="menu__content">
        @if ($title)
            <div class="menu__titleGroup">
                <h2 class="menu__title headline">{{ $title }}</h2>
            </div>
        @endif

        @if ($menuRepeater)
        <div class="menu__group">
            @foreach ($menuRepeater as $menu)
                @php
                    $file = $menu['menu'];
                    $title = $menu['title'];
                @endphp


                <div class="menu__item">
                   
               <div class="first-menu__tileGroup menu__tileGroup">
                    @for ($i = 0; $i < 4; $i++ )
                        <div class="menu__tile first-menu__tile first-menu__tile--{{ $i }}">
                            @svg('svg.tile')
                        </div>
                @endfor
               </div>

                    <a href="{{ $file['url'] }}" class="menu__link">
                    <div class="menu__link-inner">
                       <p class="sub-headline"> {{ $title }}</p>
                    </div>
                    </a>

                <div class="first-menu__tileGroup menu__tileGroup">
                    @for ($i = 0; $i < 4; $i++ )
                        <div class="menu__tile second-menu__ttle second-menu__tile--{{ $i }}">
                            @svg('svg.tile')
                    </div>
                   @endfor
                </div>


                </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

