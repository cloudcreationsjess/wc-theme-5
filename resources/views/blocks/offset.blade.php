@if($offset_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/offset-content.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else
  <div class="{{ $block->classes }}">
    @if ($offset_data)
      <div class="container" @if ($offset_data['layout'] === 'two')style="padding-bottom:100px"@endif>

        <div class="offset-content">
          <h2>{{ $offset_data['title'] }}</h2>

          @if ($offset_data['layout'] === 'two')
            <div class="content-two">
              @php
                $left_column = $offset_data['content']['left_column'];
                $right_column = $offset_data['content']['right_column'];
              @endphp
              @if($left_column)
                <div class="left-column">
                  {!! $left_column !!}
                </div>
              @endif
              @if($right_column)
                <div class="right-column">
                  {!! $right_column !!}
                </div>
              @endif
            </div>
          @else
            <div class="content">
              {!! $offset_data['content'] !!}
            </div>
          @endif
        </div>
        @if ($offset_data['button'])
          <a href="{{ $offset_data['button']['url'] }}" target="{{$offset_data['button']['target']}}" class="btn btn--outline" @if ($offset_data['layout'] === 'two')style="align-self:flex-end"@endif>{{ $offset_data['button']['title'] }}</a>
        @endif
        @if ($offset_data['logo'])
          <div class="logo">
            {!! the_image($offset_data['logo'], 'logo', 'full', 'full') !!}
          </div>
        @endif
      </div>
    @endif
  </div>
@endif


