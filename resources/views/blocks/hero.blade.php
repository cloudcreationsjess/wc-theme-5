@if($hero_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}" @if($hero_data['background_image'])style="background-image: url('{!! $hero_data['background_image']['desktop']['url'] !!}'); background-image: -webkit-image-set(url('{!! $hero_data['background_image']['desktop']['url'] !!}') 1x, url('{!! $hero_data['background_image']['mobile']['url'] !!}') 2x)" @endif>
    <div class="container">
      <div class="hero-content">
        @if($hero_data['title'])
          <h1 class="fade">{{ $hero_data['title'] }}</h1>
        @endif
        @if($hero_data['subheading'])
          <h2 class="fade">{{ $hero_data['subheading'] }}</h2>
        @endif
        <span class="vertical-line"></span>
      </div>
    </div>
  </div>

@endif




