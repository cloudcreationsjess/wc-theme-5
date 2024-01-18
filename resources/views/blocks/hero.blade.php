@if($hero_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}" @if($hero_data['background_image'])style="background-image: url('{!! $hero_data['background_image']['url'] !!}')" @endif>
    <div class="container">
      <div class="hero-content">
        @if($hero_data['title'])
          <h1>{{ $hero_data['title'] }}</h1>
        @endif
        @if($hero_data['subheading'])
          <h2>{{ $hero_data['subheading'] }}</h2>
        @endif
      </div>
    </div>
  </div>

@endif




