@php
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $postType = get_sub_field('post_type');
@endphp

<div class="career" data-header-state='normal'>
    <div class="container">
        <div class="career__content">
            @if ($title)
                <h3 class='career__title headline h5'>
                    {{ $title }}
                </h3>
            @endif

            @if ($description)
                <p class='career__description'>
                    {{ $description }}
                </p>
            @endif


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
              <div class="career__group">
                  @while ($query->have_posts()) @php $query->the_post() @endphp
                      @php 
                           $post = get_fields(get_the_ID());
                           $button = $post['link_to_external_job_listing'];
                      @endphp
   
                  

                   <div class="career__card">
                          <div class="career__card__content">
                            <h6 class="career__card__title headline">
                                 {{ $post['job_title'] }}
                            </h6>
                            <p class="career__card__description">
                                 {{ $post['job_description'] }}
                            </p>
                            <div class="career__card__button">
                                @component('components.button', [
                                    'button' => $button,
                                    'classes' => 'btn--block'
                                  ])
                                  @endcomponent
                              </div>
                          </div>
                        
                   </div>
      
                  @endwhile
              </div>
      
              @php wp_reset_postdata() @endphp
              @endif
       @endif
        </div>
    </div>
</div>