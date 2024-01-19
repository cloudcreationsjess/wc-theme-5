<article {!! post_class('h-entry') !!}>

  @include('partials.page-header')
  @include('partials.entry-meta')

  <div class="e-content mini-container">
    {!! the_content() !!}
  </div>

  <nav class="post-navigation container">
    @if(get_previous_post_link())
      <div class="nav-previous">
        <x-arrow/>{!! get_previous_post_link('%link', __('Previous Post', 'sage')) !!}
      </div>
    @endif
    @if(get_next_post_link())
      <div class="nav-next">
        {!! get_next_post_link('%link', __('Next Post ', 'sage')) !!}
        <x-arrow/>
      </div>
    @endif
  </nav>

</article>
