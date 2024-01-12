@if($offset_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/hero.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else
  <div class="{{ $block->classes }}">
    @if ($offset_data)
      <div class="container">
        @if ($offset_data['logo'])
          <div class="logo">
            {!! the_image($offset_data['logo'], 'logo', 'full', 'full') !!}
          </div>
        @endif
        <div class="offset-content">
          <h2>{{ $offset_data['title'] }}</h2>

          @if ($offset_data['layout'] === 'two')
            <div class="content-two">
              @php
                $left_column = $offset_data['content']['left_column'];
                $right_column = $offset_data['content']['right_column'];
              @endphp
              <div class="left-column">
                {!! $left_column !!}
              </div>
              <div class="right-column">
                {!! $right_column !!}
              </div>
              @else

                <div class="content">
                  {!! $offset_data['content'] !!}
                </div>
              @endif
            </div>
            @if ($offset_data['button'])
              <a href="{{ $offset_data['button']['url'] }}" target="{{$offset_data['button']['target']}}" class="btn btn--outline">{{ $offset_data['button']['title'] }}</a>
            @endif
        </div>
      </div>
    @endif
  </div>
@endif
