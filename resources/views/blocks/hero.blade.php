{{--@php--}}
{{--  $background = get_field('background_image');--}}
{{--  $title = get_field('title');--}}
{{--  $subheading = get_field('subheading');--}}
{{--@endphp--}}

{{--@if( $background )--}}

{{--  <section @if($block['anchor']) id='{{ $block['anchor'] }}' @endif class="{{ $block->classes }}">--}}
{{--    <div class="background">--}}
{{--      {!! the_image($background, '', 'large', 'large') !!}--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--      <div class="hero-content">--}}
{{--        <h1>{{ $title }}</h1>--}}
{{--        <h2>{{ $subheading }}</h2>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--@else--}}
{{--  <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>--}}

{{--@endif--}}

@if($hero_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="background">
      @if($hero_data['background_image'])
        {!! the_image($hero_data['background_image'], '', 'full', 'full') !!}
      @endif
    </div>
    <div class="container">
      <div class="hero-content">
        <h1>{{ $hero_data['title'] }}</h1>
        <h2>{{ $hero_data['subheading'] }}</h2>
      </div>
    </div>
  </div>

@endif




