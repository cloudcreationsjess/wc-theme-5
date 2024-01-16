@php
  $services = get_field('services_relationship', $project['id']);
@endphp

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
                        <div class="service h5">{!! get_the_title($service) !!}{!! (!$loop->last) ? ', ' : '' !!}</div>
                      @endforeach
                    </span>
                  @endif
                </span>
    <x-learn-more/>
  </header>
</a>

