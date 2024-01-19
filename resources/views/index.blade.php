@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container">
    <span class="fade">
    @php(dynamic_sidebar('post-archive-header'))
      </span>

    @if (have_posts())
      <ul class="blog-posts-container">

        @while(have_posts())
          @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
      </ul>

      {!! get_the_posts_navigation() !!}
  </div>
  @endif
@endsection

