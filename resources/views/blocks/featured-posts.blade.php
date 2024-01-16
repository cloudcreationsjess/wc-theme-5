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
            @include('partials.blog-card')
          @endforeach
        </ul>
      @endif
    </div>
  </div>

@endif
