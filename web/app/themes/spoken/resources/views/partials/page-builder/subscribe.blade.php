@if ($subscribe)

<div class="subscribe">
    <div class="container">
        <div class="subscribe__content">
            <div class="subscribe__tileGroup">
                @for ($i = 0; $i < 3; $i++ )
                    <div class="subscribe__tile">
                        @svg('svg.tile')
                    </div>
                @endfor
            </div>

            <div class="subscribe__textGroup">
                @if ($subscribe['title'])
                <div class="subscribe__titleGroup">
                  <h4 class="subscribe__title dusk sub-headline">{{ $subscribe['title'] }}</h4>
              </div>
             @endif
  
             @if ($subscribe['description'])
                  <p class="subscribe__description dusk ">{{ $subscribe['description'] }}</p>
             @endif
  
             @if ($subscribe['subscribe_embed'])
              <div class="subscribe__embed">
                  {!! $subscribe['subscribe_embed'] !!}
              </div>
             @endif
            </div>


           <div class="subscribe__tileGroup">
                @for ($i = 0; $i < 3; $i++ )
                    <div class="subscribe__tile">
                        @svg('svg.tile')
                    </div>
                @endfor
            </div>
        </div>
    </div>

</div>
  

@endif