@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/team-profiles.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }} fade">
    <div class="container">
      @if(get_field('title'))
        <h2 class="team-block-title fade">{!! get_field('title') !!}</h2>
      @endif
      @if(get_field('subtitle'))
        <div class="h5 team-block-subtitle fade">{!! get_field('subtitle') !!}</div>
      @endif
      <ul class="team-members">
        @php
          $teamMembers = get_posts(['post_type' => 'team_member', 'posts_per_page' => -1]);
        @endphp

        @if ($teamMembers)
          @foreach ($teamMembers as $i => $teamMember)
            @php
              $photo = get_field('photo', $teamMember->ID);
              $fname = get_field('first_name', $teamMember->ID);
			        $lname = get_field('last_name', $teamMember->ID);
					    $bio = get_field('bio', $teamMember->ID);
              $jobTitle = get_field('job_title', $teamMember->ID);
              $social = get_field('social_link', $teamMember->ID);
            @endphp
            <li class="team-member fade">
              @if($photo)
                <div class="team-member__photo">
                  {!! the_image($photo, '', 'medium', 'medium') !!}
                </div>
              @endif
              <div class="team-member__info">
                <div class="team-member__info-header">
                  @if($fname)
                    <h3 class="h4 team-member__name">{{ $fname }}</h3>
                  @endif
                  @if($lname)
                    <h3 class="h4 team-member__name">{{ $lname }}</h3>
                  @endif
                  @if($jobTitle)
                    <p class="team-member__job-title">{{ $jobTitle }}</p>
                  @endif
                </div>
                <x-learn-more class="learn-more-btn" target="#modal-{{ $teamMember->ID }}"/>
              </div>
              <!-- Modal -->

              <div id="modal-{{ $teamMember->ID }}" class="modal-container">
                <div class="modal-backdrop"></div>
                <div class="modal">
                  @if($photo)
                    <div class="team-member__photo">
                      {!! the_image($photo, '', 'medium', 'medium') !!}
                    </div>
                  @endif

                  <div class="team-member__info">
                    <div class="team-member__info-header">
                      @if($fname)
                        <h3 class="h4 team-member__name">{{ $fname }}</h3>
                      @endif
                      @if($lname)
                        <h3 class="h4 team-member__name">{{ $lname }}</h3>
                      @endif
                      @if($jobTitle)
                        <p class="team-member__job-title">{{ $jobTitle }}</p>
                      @endif
                      @if($bio)
                        <div class="bio">{!! $bio !!}</div>
                      @endif
                    </div>
                    @if($social)
                      <a href="{!! $social !!}">
                        <x-linkedin/>
                      </a>
                    @endif
                  </div>
                  <button type="button" class="modal-close">
                    <x-close/>
                  </button>
                </div>
              </div>

            </li>
          @endforeach
        @else
          <p>No team members found.</p>
        @endif
      </ul>
    </div>
  </div>

@endif
