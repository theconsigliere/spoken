{{-- 
Example usage
---
@component('components.nav', [
    'menu' => $menu
    'classes' => ''
])
@endcomponent --}}

@php
  $menu = isset($menu) ? $menu : '';
  $classes = isset($classes) ?  $classes : '';
@endphp
      
    <nav class="nav {{ $classes }}">
      <ul class="nav__list">
        @foreach ($menu as $item)
          @php
           $menu_item = $item['menu_item']; 
           $hasChildren = isset($item['has_children']) ? $item['has_children'] : null;
        @endphp

          {{-- Menu Item --}}
          <li class="nav__item  @if ($hasChildren === 'yes') nav-item--hasChildren @endif">
            <a href="{{ $menu_item['url'] }}" target="{{ $menu_item['target'] }}" class="nav__link">{{ $menu_item['title'] }}</a>

          {{-- Sub Menu --}}
          @if ($hasChildren === 'yes')
          <button class="nav__sub-toggle">
            @svg('svg.dropdown-arrow')
          </button>

          <ul class="nav__sub">
            @foreach ($item['sub_menu'] as $sub_menu)
              @php $sub_item = $sub_menu['sub_menu_item']; @endphp

              <li class="nav__sub-item">
                <a href="{{ $sub_item['url'] }}" target="{{ $sub_item['target'] }}" class="nav__sub-link">{{ $sub_item['title'] }}</a>
              </li>       
            @endforeach
         </ul>
          @endif

        </li>

        @endforeach
      </ul>
    </nav>