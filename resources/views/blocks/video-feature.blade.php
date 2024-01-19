@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/video-block.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $allowed_blocks = [ 'core/video', 'core/embed'];
  @endphp

  <div class="{{ $block->classes }} fade">
    <div class="container">
      @if($block_data['title'])
        <h2 class="title fade">{!! $block_data['title'] !!}</h2>
      @endif
      <span class="fade">
      <InnerBlocks allowedBlocks="{{ json_encode($allowed_blocks) }}"/>
  </span>
    </div>
  </div>

@endif
