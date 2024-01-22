@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/featured-blogs.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else
  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'lightest';
  @endphp

  <div class="{{ $block->classes }} fade has-{{$backgroundColorClass}}-background-color @if($block_data['style_settings'] === 'logo') has-logo @endif">
    <div class="container">
      @if ($block_data['style_settings'] === 'logo' && $block_data['logo'])
        {!! the_image($block_data['logo'], 'logo', 'medium', 'medium') !!}
      @endif
      <h2 class="title fade">{{ $block_data['title'] }}</h2>
      @if ($block_data['featured_posts'])
        <ul class="featured-posts-container">
          @foreach ($block_data['featured_posts'] as $post)
            @include('partials.blog-card')
          @endforeach
        </ul>
        <div class="swiper-featured-posts">
          <div class="swiper-wrapper">
            @foreach ($block_data['featured_posts'] as $post)
              <ul class="swiper-slide">
                @include('partials.blog-card')
              </ul>
            @endforeach
          </div>
          <div class="scroll-bar">
            <div class="swiper-scrollbar"></div>
          </div>
        </div>
      @endif
    </div>
  </div>

@endif
