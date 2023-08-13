{{-- 
Example usage
---
@component('components.button', [
    'button' => $footerBanner['button'],
    'classes' => 'btn--transparent'
])
@endcomponent --}}

@php
  $url = isset($button['url']) ? $button['url'] : '';
  $title = isset($button['title']) ? $button['title'] : '';
  $target = isset($button['target']) ? $button['target'] : '_self';
  $classes = isset($classes) ? "btn " . $classes : 'btn';
@endphp


<a href="{{ $url }}" target="{{ $target }}" class="{{ $classes }}">
  <span class="btn__wiper"></span>
  <span class="btn__text">{{ $title }}</span>
</a>