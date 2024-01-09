@if($image_block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/image-with-content.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'];
  @endphp

  <div class="{{ $block->classes }} has-{{$backgroundColorClass}}-background-color is-style-{!! $image_block_data['style_settings'] !!}">
    <div class="container">
      <div class="image-container">
        {!! the_image($image_block_data['image']) !!}
      </div>
      <div class="text-container">
        @foreach($image_block_data['content_items'] as $item)

          @switch($item['layout'])
            @case('title')
              <h2>{!! $item['title'] !!}</h2>
              @break

            @case('content')
              <div class="content">{!! $item['content'] !!}</div>
              @break

            @case('accordion')
              <div class="accordion" role="tablist">
                @foreach($item['accordion_items'] as $index => $accordion_item)
                  <div class="accordion-item">
                    <button id="heading{{ $index }}" class="accordion-header" role="tab" aria-controls="panel{{ $index }}" aria-expanded="false" onclick="toggleAccordion({{ $index }})">
                      {{ $accordion_item['accordion_title'] }} {{-- Adjust according to your field names --}}
                    </button>
                    <div id="panel{{ $index }}" class="accordion-body" role="tabpanel" aria-labelledby="heading{{ $index }}" hidden>
                      {{ $accordion_item['accordion_content'] }} {{-- Adjust according to your field names --}}
                    </div>
                  </div>
                @endforeach
              </div>
              @break

            @case('button')
              <a href="{{ $item['button']['button']['url'] }}" class="btn btn--{{ $item['button']['button_type'] }}">{{ $item['button']['button']['title'] }}</a>
              @break
          @endswitch
        @endforeach
      </div>

    </div>
  </div>

@endif
