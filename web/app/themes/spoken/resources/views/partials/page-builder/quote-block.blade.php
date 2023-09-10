@php
    $quote = get_sub_field('quote');
    $backgroundColour = get_sub_field('background_colour');
@endphp

<section class="quoteSection" style="background: {{ $backgroundColour }}" data-header-state='normal'>
    <div class="quoteSection__inner">
            <div class="quoteSection__quote">
                @if ($quote)
                        <h2 class="quoteSection__title cursive" data-module='split-text'>{{ $quote }}</h2>
                @endif
            </div>
    </div>
</section>