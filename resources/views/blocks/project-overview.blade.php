@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/project-overview.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }} container">
    <div class="overview-container">
      @if($block_data['project_overview']['title'])
        <h2>{!! $block_data['project_overview']['title'] !!}</h2>
      @endif
      @if($block_data['project_overview']['description'])
        {!! $block_data['project_overview']['description'] !!}
      @endif
    </div>
    <div class="list-container">
      @if($block_data['project_details']['title'])
        <h3>{{ $block_data['project_details']['title'] }}</h3>
      @endif
      @if($block_data['project_details']['list_items'])
        <ul class="check-list">
          @foreach ($block_data['project_details']['list_items'] as $item)
            @if($item['item'])
              <li>{{ $item['item'] }}</li>
            @endif
          @endforeach
        </ul>
      @endif
    </div>
  </div>

@endif
