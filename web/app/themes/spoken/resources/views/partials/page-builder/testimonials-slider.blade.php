@php
    $title = get_sub_field('title');
    $postType = get_sub_field('select_post_type');
@endphp

<section class="testimonial" data-module='testimonial-slider'>
    <div class="container">
        <div class="testimonial__content">

          @component('components.logo-spinner', [
            'size' => 'medium',
            'classes' => 'testimonial',
        ])
        @endcomponent

            @if ($title)
            <div class="testimonial__titleGroup">
                <h4 class="testimonial__title headline dusk">{{ $title }}</h4>
                <div class="testimonial__divider">
                    @svg('svg.wavy-line')
                </div>
            </div>
            @endif
        </div>

        @if ($postType)
           
        {{-- query $Postype and loop through --}}
        @php
           $args = array(
               'post_type' => $postType->name,
               'posts_per_page' => -1,
               'orderby' => 'date',
               'order' => 'DESC',
           );
           $query = new WP_Query( $args );
       @endphp

       @if ($query->have_posts())
       <div class="testimonial__group">
        <div class="swiper js-swiper">
          <div class="swiper-wrapper">
            @while ($query->have_posts()) @php $query->the_post() @endphp
            @php 
                 $post = get_fields(get_the_ID());
                 $name = $post['name'];
                $quote = $post['quote'];
            @endphp
  
            <div class="swiper-slide">
              <div class="testimonial__item">
                @if ($quote)
                  <p class="testimonial__item--quote dusk">{{ $quote }}</p>
                @endif
                @if ($name)
                  <p class="testimonial__item--name dusk"><strong>{{ $name }}</strong></p>
                @endif
              </div>
            </div>
            @endwhile
          </div>
          <div class="swiper-button-prev js-prev"></div>
          <div class="swiper-button-next js-next"></div>
        </div>
        
        <div class="swiper-pagination js-pagination"></div>
      </div>

       @php wp_reset_postdata() @endphp
       @endif
@endif
    </div>



</section>