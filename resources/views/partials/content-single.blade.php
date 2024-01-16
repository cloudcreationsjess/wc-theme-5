<article @php(post_class('h-entry'))>
  @include('partials.page-header')
  @include('partials.entry-meta')
  <div class="e-content mini-container">
    @php(the_content())
  </div>

  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

</article>
