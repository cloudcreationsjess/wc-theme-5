@if($block_data['is_preview'])
  <figure>
    <img src="{{ get_stylesheet_directory_uri() }}/resources/views/blocks/previews/contact.png" alt="Preview Image" style="width:100%; height:auto;">
  </figure>
@else

  <div class="{{ $block->classes }}">
    <div class="left-container">
      <div class="background">
        {!! the_image($block_data['background_image'], '', 'full', 'full') !!}
      </div>
      <div class="text-content">
        @if($block_data['title'])
          <h1>{!! $block_data['title'] !!}</h1>
        @endif
        @if($block_data['subtitle'])
          <h2>{!! $block_data['subtitle'] !!}</h2>
        @endif
        @if($block_data['contact_info'])
          @php
            $contact = $block_data['contact_info'];
          @endphp
          <div class="contact-info">
            @if($contact['email'])
              <div class="email contact-item">
                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.5 16">
                  <defs>
                    <style>
                      .cls-1 {
                        fill: none;
                        stroke: #e8e8e5;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                      }
                    </style>
                  </defs>
                  <g id="Layer_1-2" data-name="Layer 1">
                    <path id="envelope" class="cls-1" d="m20,2.75v10.5c0,1.24264-1.00736,2.25-2.25,2.25H2.75c-1.24264,0-2.25-1.00736-2.25-2.25V2.75m19.5,0c0-1.24264-1.00736-2.25-2.25-2.25H2.75C1.50736.5.5,1.50736.5,2.75m19.5,0v.243c.00009.7811-.40494,1.50636-1.07,1.916l-7.5,4.615c-.72355.44567-1.63645.44567-2.36,0L1.57,4.91c-.66506-.40964-1.07009-1.1349-1.07-1.916v-.244"/>
                  </g>
                </svg>
                <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
              </div>
            @endif
            @if($contact['phone'])
              <div class="phone contact-item">
                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.5 20.5">
                  <defs>
                    <style>
                      .cls-1 {
                        fill: none;
                        stroke: #e8e8e5;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                      }
                    </style>
                  </defs>
                  <g id="Layer_1-2" data-name="Layer 1">
                    <path id="phone" class="cls-1" d="m.5,5c0,8.28427,6.71573,15,15,15h2.25c1.24264,0,2.25-1.00736,2.25-2.25v-1.372c.00019-.51615-.35119-.96609-.852-1.091l-4.423-1.106c-.4393-.11-.90171.05439-1.173.417l-.97,1.293c-.27491.38032-.76701.53486-1.21.38-3.31339-1.21814-5.92486-3.82961-7.143-7.143-.15486-.44299-.00032-.93509.38-1.21l1.293-.968c.36284-.27113.52728-.73368.417-1.173l-1.106-4.427c-.126-.49981-.57555-.85006-1.091-.85h-1.372C1.50736.5.5,1.50736.5,2.75v2.25Z"/>
                  </g>
                </svg>
                <a href="tel:{{ $contact['phone'] }}">{{ $contact['phone'] }}</a>
              </div>
            @endif
            @if($contact['address'])
              <div class="address contact-item">
                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 19.75">
                  <defs>
                    <style>
                      .cls-1 {
                        fill: none;
                        stroke: #e8e8e5;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                      }
                    </style>
                  </defs>
                  <g id="Layer_1-2" data-name="Layer 1">
                    <g id="map-pin">
                      <path id="Path_114" data-name="Path 114" class="cls-1" d="m11,8c0,1.65685-1.34315,3-3,3s-3-1.34315-3-3,1.34315-3,3-3,3,1.34315,3,3Z"/>
                      <path id="Path_115" data-name="Path 115" class="cls-1" d="m15.5,8c0,7.142-7.5,11.25-7.5,11.25,0,0-7.5-4.108-7.5-11.25C.5,3.85786,3.85786.5,8,.5s7.5,3.35786,7.5,7.5Z"/>
                    </g>
                  </g>
                </svg>
                @if($contact['map'])
                  <a href="{{$contact['map']}}" target="_blank">{!! $contact['address'] !!}</a>
                @else
                  {!! $contact['address'] !!}
                @endif
              </div>
            @endif

          </div>
        @endif
      </div>
    </div>
    <div class="right-container">
      <div class="form-container fade">
        @if($block_data['contact_form']['form_title'])
          <h2>{!! $block_data['contact_form']['form_title'] !!}</h2>
          @if($block_data['contact_form']['form_shortcode'])
            {!! do_shortcode($block_data['contact_form']['form_shortcode']) !!}
          @endif
        @endif
      </div>
    </div>
  </div>

@endif
