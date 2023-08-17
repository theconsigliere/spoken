@php
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $perkRepeater = get_sub_field('add_perk');

@endphp

{{-- @foreach ($perkRepeater as $perk)
@php
    $title = $perk['title'];
    $icon = $perk['icon'];
@endphp

  

@endforeach --}}



<section class="workWithUs">
    <div class="workWithUs__pattern workWithUs__pattern--top">
        @svg('svg.green-dot-pattern')
    </div>

    <div class="container">
        <div class="workWithUs__content">

            @if ($title)
              <h3 class='workWithUs__title headline'>
                {{ $title }}
              </h3>
            @endif
      
            @if ($description)
              <p class='workWithUs__description'>
                {{ $description }}
              </p>
            @endif
      
              @if ($perkRepeater)
              <div class="workWithUs__repeater">
                  @foreach ($perkRepeater as $perk)
                  @php
                      $title = $perk['title'];
                      $icon = $perk['icon'];
                  @endphp
      
                  <div class="workWithUs__item">
                      <div class="workWithUs__icon">
                          @svg($icon)
                      </div>
                      <h6 class="workWithUs__title">
                          {{ $title }}
                      </h6>
                  </div>
                  @endforeach
              </div>
              @endif
      
          </div>

    </div>




    <div class="workWithUs__pattern workWithUs__pattern--bottom">
        @svg('svg.green-dot-pattern')
    </div>

</section>