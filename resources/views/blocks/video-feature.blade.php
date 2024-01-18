@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/video-block.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $allowed_blocks = [ 'core/video', 'core/embed'];
  @endphp

  <div class="{{ $block->classes }}">
    <div class="container">
      @if($block_data['title'])
        <h2 class="title">{!! $block_data['title'] !!}</h2>
      @endif

      <InnerBlocks allowedBlocks="{{ json_encode($allowed_blocks) }}"/>
    </div>
  </div>

@endif
