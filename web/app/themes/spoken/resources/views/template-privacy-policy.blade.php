{{--  Template Name: Privacy Policy
  --}}


@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  

  <div class="TemplatePrivacyPolicy">
      <div class="container">
        <div class="TemplatePrivacyPolicy__intro">
           <h1 class='TemplatePrivacyPolicyHero__title headline'>{{ $title }}</h1>
        </div>

        <div class="TemplatePrivacyPolicy__content">
            <div class="TemplatePrivacyPolicy__content-inner"> 
                {!! $content !!}
            </div>
        </div>
      </div>
  </div>
   
  @endwhile
@endsection
