@if($offset_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    @if ($offset_data)
      <div class="container">
        @if ($offset_data['logo'])
          {!! the_image($offset_data['logo'], 'logo', 'large', 'large') !!}
        @endif

        <div class="offset-content">
          <h2>{{ $offset_data['title'] }}</h2>
          <div class="content">
            {!! $offset_data['content'] !!}
          </div>
          @if ($offset_data['button'])
            <a class="btn btn--outline" href="{{ $offset_data['button']['url'] }}" target="{{ $offset_data['button']['target'] }}">
              {{ $offset_data['button']['title'] }}
            </a>
          @endif
        </div>
      </div>
    @endif

  </div>
@endif
