@if($image_block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/image-with-content.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'lightest';
  @endphp

  <div class="{{ $block->classes }} has-{{$backgroundColorClass}}-background-color is-style-{!! $image_block_data['style_settings'] !!}">
    <div class="container">
      @if($image_block_data['image'])
        <div class="image-container">
          {!! the_image($image_block_data['image']) !!}
        </div>
      @endif
      <div class="text-container">
        @if($image_block_data['content_items'])
          @foreach($image_block_data['content_items'] as $item)
            @switch($item['layout'])
              @case('title')
                @if($item['title'])
                  <h2>{!! $item['title'] !!}</h2>
                @endif
                @break

              @case('content')
                @if($item['content'])
                  <div class="content">{!! $item['content'] !!}</div>
                @endif
                @break

              @case('accordion_item')
                <div class="accordion" role="tablist">
                  @if($item['accordion_items'])
                    @foreach($item['accordion_items'] as $index => $accordion_item)
                      <div class="accordion-item">
                        @if($accordion_item['accordion_title'])
                          <button id="heading{{ $index }}" class="accordion-header" role="tab" aria-controls="panel{{ $index }}" aria-expanded="false">
                            {{ $accordion_item['accordion_title'] }}
                            <x-plus/>
                          </button>
                        @endif
                        @if($accordion_item['accordion_content'])
                          <div id="panel{{ $index }}" class="accordion-body" role="tabpanel" aria-labelledby="heading{{ $index }}" hidden>
                            {{ $accordion_item['accordion_content'] }}
                          </div>
                        @endif
                      </div>
                    @endforeach
                  @endif
                </div>
                @break

              @case('button')
                @if($item['button']['button'])
                  <a href="{{ $item['button']['button']['url'] }}" class="btn btn--{{ $item['button']['button_type'] }}">{{ $item['button']['button']['title'] }}</a>
                @endif
                @break
            @endswitch
          @endforeach
        @endif
      </div>

    </div>
  </div>

@endif
