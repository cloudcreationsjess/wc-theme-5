<div class="entry-meta">
  <time class="dt-published h2" datetime="{{ get_post_time('c', true) }}">
    {{ get_post_time('m-d-y') }} |&nbsp;
  </time>

  @php
    $categories = get_the_category();
    $category = $categories[0];
  @endphp
  <div class="h2 category">
    {!! $category->name !!}
  </div>
</div>



