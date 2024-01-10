@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/services-slider.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="container">
      <div class="cta-container">
        @if($block_data['title'])
          <h2 class="title">{!! $block_data['title'] !!}</h2>
        @endif
        @if($block_data['button'])
          @php
            $type = $block_data['button_type'];
            $button = $block_data['button'];
          @endphp
          <a href="{{ $button['url'] }}" class="btn btn--{{ $type }}">{!! $button['title'] !!}</a>
        @endif
      </div>

      <div class="swiper services-slider">
        <div class="swiper-wrapper">
          @foreach ($block_data['services'] as $service)
            @php
              $excerpt = get_field('excerpt', $service['id']);
            @endphp
            <div class="swiper-slide">
              <a href="{{ $service['learn_more_url'] }}" class="services-card">
                <h3>{{ $service['name'] }}</h3>
                <p class="excerpt">{{ $excerpt }}</p>
                <x-learn-more/>
              </a>
            </div>
          @endforeach
        </div>
        <div class="scroll-bar">
          <div class="swiper-scrollbar"></div>
        </div>
      </div>
    </div>
  </div>

@endif
