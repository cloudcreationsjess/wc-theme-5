@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/WCBlock.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="container">

      @if($block_data['title'])
        <h2 class="title">{!! $block_data['title'] !!}</h2>
      @endif

      <ul class="service-list">
        @foreach ($block_data['services'] as $service)
          @php
            $excerpt = get_field('excerpt', $service['id']);
          @endphp
          <li class="service-item">
            <header>
              <h3>{{ $service['name'] }}</h3>
              <p class="excerpt">{{ $excerpt }}</p>
            </header>
            <a href="{{ $service['learn_more_url'] }}" class="services-card">
              <x-learn-more/>
            </a>
          </li>
        @endforeach

      </ul>
    </div>
  </div>
@endif
