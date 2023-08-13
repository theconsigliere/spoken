@if ($_SERVER['WP_ENV'] == 'development')
  @include('devtools.debugger')
  @include('devtools.mq-helper')
@endif

@if ($_SERVER['WP_ENV'] == 'staging')
  @include('devtools.bugherd')
@endif
