 @if ($preloader['show_preloader'] === 'show' && is_front_page() ) 
{{-- @if ($preloader['show_preloader'] === 'show' ) --}}

<div class="preloader js-preloader" data-module='preloader'>

  @component('components.logo-spinner', [
    'size' => 'large',
    'classes' => ''
])
@endcomponent


</div>

<div class="preloader__background js-preloader-background"></div>

  

@endif