@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/process-list.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="container">
      <div class="left-column">
        @if($block_data['title'])
          <h2>{{ $block_data['title'] }}</h2>
        @endif
        @if ($block_data['button'])
          <a href="{{ $block_data['button']['url'] }}" class="btn btn--{{ $block_data['button_type'] }}">
            {{ $block_data['button']['title'] }}
          </a>
        @endif
      </div>

      @if ($block_data['process_list'])
        <ul class="process-list">
          @foreach ($block_data['process_list'] as $process)
            <li class="process-item">
              @if($process['title'])
                <h3 class="process-item__title">{!! $process['title'] !!}</h3>
              @endif
              @if($process['description'])
                {!! $process['description'] !!}
              @endif
            </li>
          @endforeach
        </ul>
      @endif
      <div class="logo">
        @if($block_data['logo'])
          {!! the_image($block_data['logo'], '', 'medium', 'medium') !!}
        @endif
      </div>
    </div>
  </div>

@endif
