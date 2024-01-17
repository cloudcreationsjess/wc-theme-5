<article class="h-entry container">

  <div class="page-header">
    <h1>{!! get_the_title() !!}</h1>
    <div class="post-meta">
      @php
        $location_terms = get_the_terms(get_the_ID(), 'location');
        $date_terms = get_the_terms(get_the_ID(), 'project-date');
      @endphp

      @if($location_terms)
        <h2 class="location-term">{{ $location_terms[0]->name }}</h2>
      @endif

      @if($date_terms)
        <h2 class="date-term">&nbsp;| {{ $date_terms[0]->name }}</h2>
      @endif
    </div>
    <div class="tags">
      @php
        $tags = get_the_tags();
      @endphp
      @if($tags)
        @foreach($tags as $tag)
          <div class="tag">{{ $tag->name }}</div>
        @endforeach
      @endif
    </div>
  </div>

  <div class="e-content">
    {!! the_content() !!}
  </div>

  <nav class="post-navigation container">
    <div class="nav-previous">
      @if(get_previous_post_link())
        <x-arrow/>{!! get_previous_post_link('%link', __('Previous Project', 'sage')) !!}
      @endif
    </div>
    <div class="nav-next">
      @if(get_next_post_link())
        {!! get_next_post_link('%link', __('Next Project ', 'sage')) !!}
        <x-arrow/>
      @endif
    </div>

</article>
