{{-- 
Example usage
---
        @component('components.nav-repeater', [
            'menu' => $header['mobile_menu'],
            'classes' => 'mobileMenu'
          ])
      @endcomponent --}}

      @php
      $menu = isset($menu) ? $menu : '';
      $classes = isset($classes) ?  $classes : '';
    @endphp
          
        <nav class="{{ $classes }}__nav">
          <ul class="{{ $classes }}-nav__list">
            @foreach ($menu as $item)
              @php
               $menu_item = $item['menu_item']; 
            @endphp
    
              {{-- Menu Item --}}
              <li class="{{ $classes }}-nav__item js-nav-item">
                <div class="{{ $classes }}-nav__item-inner">
            
                  <a href="{{ $menu_item['url'] }}" target="{{ $menu_item['target'] }}" class="nav__link h4">{{ $menu_item['title'] }}</a> 
        
                </div>
    
            </li>
    
            @endforeach
          </ul>
        </nav>
    
    
    
    
        