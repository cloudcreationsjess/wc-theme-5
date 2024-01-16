<li class="post-card">
  <article class="post-card-article">

    <a href="{{ get_permalink($post->ID) }}">
                  <span class="image-wrapper">
                  {!! the_image_by_post_id($post->ID, 'featured-image', 'medium_large', 'medium_large') !!}
                  </span>
      <span class="post-lower">
                  <span class="post-meta">
                    @php
                      $categories = get_the_category($post->ID);
                      $catname = $categories[0]->name;
                    @endphp
                    <span class="category mice">{!! $catname !!}</span>
                    <span class="date h5">{{ get_the_date('F j, Y', $post->ID) }}</span>
                    <div class="h4">{{ $post->post_title }}</div>
                  </span>
                  <x-learn-more/>
                    </span>
    </a>
  </article>
</li>
