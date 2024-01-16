@php

  $projects = [];

  $args = [
      'post_type'      => 'project',
      'posts_per_page' => -1,

  ];

  $query = new \WP_Query($args);

  while ( $query->have_posts() ) {
      $query->the_post();

      $services = get_field('services_relationship');


      // Format and push project data to the $projects array
      $projects[] = [
          'name'           => get_the_title(),
          'id'             => get_the_id(),
          'locations'      => wp_get_post_terms(get_the_ID(), 'location'),
          'services'       => $services,
          'tags'           => wp_get_post_terms(get_the_ID(), 'post_tag', ['fields' => 'names']),
          'learn_more_url' => get_permalink(),
      ];
  }

  // Reset post data
  wp_reset_postdata();

@endphp

<section class="project-archive-posts">
  <div class="container">
    <div class="project-query-container">
      @if(get_field('logo'))
        <div class="logo">
          {!! the_image(get_field('logo'), 'logo', 'full', 'full') !!}
        </div>
      @endif
      @foreach($projects as $project)
        @include('partials.project-card')
      @endforeach
    </div>

  </div>

</section>
