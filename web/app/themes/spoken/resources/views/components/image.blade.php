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

@if ($lazyload)
  <img
    alt="{{ $image['alt'] ?? '' }}"
    data-sizes="{{ $sizes }}"
    data-src="{{ $image['sizes']['large'] ?? null }}" 
    data-srcset="{{ isset($image['id']) ? wp_get_attachment_image_srcset($image['id'], 'large') : null }}" 
    class="{{ $classes }}"
    width="{{ $image['width'] }}"
    height="{{ $image['height'] }}"
  >
@else
  <img
    alt="{{ $image['alt'] ?? '' }}"
    sizes="{{ $sizes }}"
    src="{{ $image['sizes']['large'] ?? null }}" 
    srcset="{{ isset($image['id']) ? wp_get_attachment_image_srcset($image['id'], 'large') : null }}" 
    class="{{ $classes }}"
    width="{{ $image['width'] }}"
    height="{{ $image['height'] }}"
  >
@endif

