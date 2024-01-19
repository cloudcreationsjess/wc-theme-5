<h2 class="entry-meta container" datetime="{{ get_post_time('c', true) }}">
  {{ get_post_time('m-d-y') }}
  @php
    $categories = get_the_category();
    $category = $categories[0];
  @endphp
  @if($category)
    | {!! $category->name !!}
  @endif
</h2>



