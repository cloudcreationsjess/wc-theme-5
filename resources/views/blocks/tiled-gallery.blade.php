@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/tiled-gallery.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="container">
      <div class="gallery-grid">
        @if($block_data['gallery'])
          @foreach($block_data['gallery'] as $index => $image)
            @php
              // Calculate the position based on the pattern
              $column_span = 1;
              $row_span = 1;

              // Reset pattern after the 12th item
              if ($index >= 12) {
                $index = $index % 12;
              }

              if ($index == 0 || $index == 9) {
                $row_span = 2;
              } elseif ($index == 5) {
                $column_span = 2;
                $row_span = 2;
              } elseif ($index == 6) {
                $row_span = 2;
              }


            @endphp
            <figure class="grid-item" style="grid-column: span {{ $column_span }}; grid-row: span {{ $row_span }};">
              {!! the_image($image, '', 'large', 'large') !!}
            </figure>
          @endforeach
        @endif
      </div>
    </div>
  </div>

@endif
