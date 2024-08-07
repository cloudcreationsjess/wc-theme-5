@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/text-hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="container fade">
      @if($block_data['title'])
        <h1>{!! $block_data['title'] !!}</h1>
      @endif
      @if($block_data['subtitle'])
        <h2>{!! $block_data['subtitle'] !!}</h2>
      @endif
    </div>
  </div>

@endif
