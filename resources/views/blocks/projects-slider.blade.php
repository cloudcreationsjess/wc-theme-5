@if($project_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/projects-slider.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $is_preview = $project_data['is_preview'];
    $projects = $project_data['project'];
  @endphp
  <div class="{{ $block->classes }}">
    @if($project_data['title'])
      <h2 class="title">{!! $project_data['title'] !!}</h2>
    @endif
    <div class="swiper-container">
      <div class="swiper-wrapper">

        @foreach($projects as $project)

          <a class="swiper-slide" href="{{ $project['learn_more_url'] }}">
            <span class="image-wrapper">
              @if($project['tags'])
                @foreach($project['tags'] as $tag)
                  <span class="tag">{{ $tag }}</span>
                @endforeach
              @endif
              {!! the_image_by_post_id($project['id'], 'featured') !!}
            </span>
            <header>
              <h3>{{ $project['name'] }}</h3>
              @if($project['locations'])
                @foreach($project['locations'] as $location)
                  <p>{{ $location->name }}</p>
                @endforeach
              @endif
              @if($project['services'])
                @foreach($project['services'] as $service)
                  <div class="service">{!! $service !!}</div>
                @endforeach
              @endif
              <span>Learn More</span>
            </header>
          </a>
        @endforeach
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>

    </div>
  </div>

  @unless($is_preview)
    <script>
      // Initialize Swiper
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    </script>
  @endunless

@endif
