{{-- 
Example usage
---
@component('components.image', [
  'image' => $test['page_builder'][0]['cutout_image'],
  'classes' => 'fill',
  'lazyload' => true,
])
@endcomponent --}}

@php
  $sizes = isset($sizes) ? $sizes : 'auto';
  $lazyload = isset($lazyload) && $lazyload ? 'lazyload' : '';
  $classes = isset($classes) ? $lazyload . " " . $classes : $lazyload;
@endphp

@if (!$lazyload || is_admin())
  <img
      alt="{{ $image['alt'] ?? '' }}"
      sizes="{{ $sizes }}"
      src="{{ $image['sizes']['large'] ?? null }}" 
      srcset="{{ isset($image['id']) ? wp_get_attachment_image_srcset($image['id'], 'large') : null }}" 
      class="{{ $classes }}"
      width="{{ $image['width'] }}"
      height="{{ $image['height'] }}"
  >
@else

{{-- Lazyload --}}
  <img
    alt="{{ $image['alt'] ?? '' }}"
    loading=”lazy”
    data-sizes="{{ $sizes }}"
    data-src="{{ $image['sizes']['large'] ?? null }}" 
    data-srcset="{{ isset($image['id']) ? wp_get_attachment_image_srcset($image['id'], 'large') : null }}" 
    class="{{ $classes }}"
    width="{{ $image['width'] }}"
    height="{{ $image['height'] }}"
  >
@endif

