<button type="button" {{ $attributes->merge(['class' => 'cta', 'data-target' => isset($target) ? $target : null]) }}>
  <p class="btn--text">Learn More</p>
  <x-arrow/>
</button>
