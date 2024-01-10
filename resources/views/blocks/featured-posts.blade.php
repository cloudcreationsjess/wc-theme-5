@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/WCBlock.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else
  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'lightest';
  @endphp

  <div class="{{ $block->classes }} has-{{$backgroundColorClass}}-background-color">
    <div class="container">
      @if ($block_data['style_settings'] === 'logo' && $block_data['logo'])
        {!! the_image($block_data['logo'], 'logo', 'medium', 'medium') !!}
      @endif
      <h2 class="title">{{ $block_data['title'] }}</h2>
      @if ($block_data['featured_posts'])
        <ul class="featured-posts-container">
          @foreach ($block_data['featured_posts'] as $post)
            <li>
              <article class="post-card">

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
          @endforeach
        </ul>
      @endif
    </div>
  </div>

@endif
