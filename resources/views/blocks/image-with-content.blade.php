@if($image_block_data['is_preview'] && $block->style == "right")
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/image-with-content.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@elseif($image_block_data['is_preview'] && $block->style == "left")
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/image-with-content-left.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'lightest';
  @endphp

  <div class="{{ $block->classes }} fade has-{{$backgroundColorClass}}-background-color is-style-{!! $image_block_data['style_settings'] !!}">
    <div class="container">
      @if($image_block_data['image'])
        <div class="image-container @php
        $class = $block->style == "right" ? 'fade-in-left' : 'fade-in-right';
        echo $class;
    @endphp">
          {!! the_image($image_block_data['image'], '', 'large', 'large') !!}
          <span class="vertical-line"></span>
        </div>
      @endif
      <div class="text-container">
        <span class="vertical-line"></span>
        @if($image_block_data['content_items'])
          @foreach($image_block_data['content_items'] as $item)
            @switch($item['layout'])
              @case('title')
                @if($item['title'])
                  <h2 class="fade">{!! $item['title'] !!}</h2>
                @endif
                @break

              @case('content')
                @if($item['content'])
                  <div class="content fade">{!! $item['content'] !!}</div>
                @endif
                @break

              @case('accordion_item')
                <div class="accordion" role="tablist">
                  @if($item['accordion_items'])
                    @foreach($item['accordion_items'] as $index => $accordion_item)
                      <div class="accordion-item" role="tab">
                        @if($accordion_item['accordion_title'])
                          <button id="heading{{ $index }}" class="accordion-header" aria-controls="panel{{ $index }}" aria-expanded="false">
                            {{ $accordion_item['accordion_title'] }}
                            <span class="plus-svg">
                              <x-plus/>
                             </span>
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
                  <span class="fade">
                  <a href="{{ $item['button']['button']['url'] }}" class="btn btn--{{ $item['button']['button_type'] }}">{{ $item['button']['button']['title'] }}</a>
                  </span>
                @endif
                @break
            @endswitch
          @endforeach
        @endif
      </div>

    </div>
  </div>

@endif
