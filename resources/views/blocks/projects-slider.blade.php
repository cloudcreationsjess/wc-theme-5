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
        @if($projects)
          @foreach($projects as $project)
            @php
              $services = get_field('services_relationship', $project['id']);
            @endphp
            <div class="swiper-slide">
              @include('partials.project-card')
            </div>
          @endforeach
        @endif
      </div>
      <!-- Add Pagination -->
      <div class="scroll-bar">
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
  </div>

@endif
