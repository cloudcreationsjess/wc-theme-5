@if($mini_cta['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/mini-cta.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  @php
    $backgroundColorClass = $block->instance->attributes['backgroundColor'] ?? 'bright';
  @endphp
  <div class="{{ $block->classes }} has-{{$backgroundColorClass}}-background-color">
    <div class="mini-container">
      @if($mini_cta['title'])
        <h3 class="text">
          {{$mini_cta['title']}}
        </h3>
      @endif

      @if ($mini_cta['button'])
        <a class="btn btn--primary-light" href="{{ $mini_cta['button']['url'] }}" target="{{ $mini_cta['button']['target'] }}">
          {{ $mini_cta['button']['title'] }}
        </a>
      @endif
    </div>
  </div>
@endif
