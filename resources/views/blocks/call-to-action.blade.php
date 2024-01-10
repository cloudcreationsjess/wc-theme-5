@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/call-to-action.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'lightest';
  @endphp

  <div class="{{ $block->classes }} has-{{$backgroundColorClass}}-background-color">

    @if($block_data['background_type'] == 'image' && $background_image)
      {!! the_image($background_image, 'background-image', 'full', 'full') !!}
    @endif

    <div class="mini-container">
      @if($block_data['title'])
        <h2 class="pullquote">{!! $block_data['title'] !!}</h2>
      @endif

      @if($block_data['button'])
        <a href="{{ $block_data['button']['url'] }}" target="{{ $block_data['button']['target'] }}" class="btn btn--outline-light">{!! $block_data['button']['title'] !!}</a>
      @endif

      @if($block_data['subtext'])
        <p class="subtext mice">{!! $block_data['subtext'] !!}</p>
      @endif
    </div>

  </div>

@endif
