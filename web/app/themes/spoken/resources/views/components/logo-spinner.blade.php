{{-- 
Example usage
---
@component('components.logo-spinner', [
    'size' => 'medium',
    'classes' => 'testimonial',
    'color' => 'white'
])
@endcomponent --}}

@php
  $size = isset($size) ? $size : '';
    // ''medium', 'large'
  $classes = isset($classes) ? $classes : '';
  // 'white'
  $color = isset($color) ? $color : '';
@endphp


<div class="{{ $classes }}__spoken-circle spoken-circle spoken-circle--{{ $size }} js-spinner">
    <div class="spoken-circle--circle js-circle">
        @if ($color === 'white')
            @svg('svg.spoken-white-circle')
        @else
            @svg('svg.spoken-gold-circle')
        @endif
    </div>
    <div class="spoken-circle--text js-text">
        @if ($color === 'white')
            @svg('svg.white-circle-text')
        @else
            @svg('svg.gold-circle-text')
        @endif
    </div>
</div>


