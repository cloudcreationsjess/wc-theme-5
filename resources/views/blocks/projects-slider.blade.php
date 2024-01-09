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
    <div class="container">
      @if($project_data['title'])
        <h2 class="title">{!! $project_data['title'] !!}</h2>
      @endif
    </div>
    <div class="swiper">
      <div class="swiper-wrapper">

        @foreach($projects as $project)
          @php
            $services = get_field('services_relationship', $project['id']);
          @endphp
          <div class="swiper-slide">
            <a class="project-card" href="{{ $project['learn_more_url'] }}">
              <span class="image-wrapper">
                {!! the_image_by_post_id($project['id'], 'featured-image', 'medium_large', 'medium_large') !!}
                @if($project['tags'])
                  <span class="tags">
                    @foreach($project['tags'] as $tag)
                      <span class="tag">{{ $tag }}</span>
                    @endforeach
                  </span>
                @endif
              </span>
              <header>
                <span class="header-content">
                  <h3>{{ $project['name'] }}</h3>
                  @if($project['locations'])
                    @foreach($project['locations'] as $location)
                      <p class="h4 location"> {{ $location->name }}</p>
                      @if(!$loop->last)
                        ,
                      @endif
                    @endforeach
                  @endif
                  @if($services)
                    <span class="services">
                 @foreach($services as $key => $service)
                        <div class="service h5">{!! $service->post_title !!}{!! (!$loop->last) ? ', ' : '' !!}</div>
                      @endforeach
                    </span>
                  @endif
                </span>
                <span class="cta">
                  <p class="btn--text">Learn More</p>
                  <x-arrow/>
                </span>
              </header>
            </a>
          </div>
        @endforeach
      </div>
      <!-- Add Pagination -->
      <div class="scroll-bar">
        <div class="swiper-scrollbar"></div>
      </div>

    </div>
  </div>

@endif
