@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @if(has_flexible('page_builder'))
      <div class="page-builder">
        {!! the_flexible('page_builder') !!}
      </div>
    @endif

    @if ($getSubscribe === 'show')
      @include('partials.global.subscribe')
    @endif
    
  @endwhile
@endsection
