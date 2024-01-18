@php
  $footerLogo = get_field('footer_logo', 'option');
  $footerContactInfo = get_field('footer_contact_info', 'option');
  $socialLinks = get_field('social_links', 'option');
  $formTitle = get_field('subscribe_form_title', 'option');
  $formEmbed = get_field('subscribe_form_embed', 'option');
@endphp

<footer id="footer" class="content-info" role="contentinfo">
  <div class="container">
    <div class="footer-left">
      <a href="{{ home_url('/') }}" class="footer-logo">
        @isset($footerLogo)
          {!! the_image($footerLogo, 'logo', 'thumbnail', 'thumbnail') !!}
        @endisset
      </a>
      <div class="footer-contact-info">
        @isset($footerContactInfo['phone'])
          <a href="tel:{!! $footerContactInfo['phone'] !!}" class="phone" target="_blank">{!! $footerContactInfo['phone'] !!}</a>
        @endisset

        @isset($footerContactInfo['email'])
          <a href="mailto:{!! $footerContactInfo['email'] !!}" class="email" target="_blank">{!! $footerContactInfo['email'] !!}</a>
        @endisset

        @isset($footerContactInfo['address'])
          <a href="{!! $footerContactInfo['map_link'] !!}" target="_blank">{!! $footerContactInfo['address'] !!}</a>
        @endisset

        <div class="footer-social-links">
          @isset($socialLinks)
            @foreach ($socialLinks as $socialLink)
              @isset($socialLink['social_link'])
                <a href="{{ $socialLink['social_link'] }}" target="_blank" class="footer-social-link">
                  @isset($socialLink['social_icon'])
                    {!! the_image($socialLink['social_icon'], 'icon', 'thumbnail', 'thumbnail') !!}
                  @endisset
                </a>
              @endisset
            @endforeach
          @endisset
        </div>
      </div>
    </div>

    <div class="footer-subscribe-container footer-right">
      @isset($formTitle)
        <div class="footer-title h4">{{ $formTitle }}</div>
      @endisset

      <div class="subscribe-form">
        @if($formEmbed)
          {!! $formEmbed !!}
        @else
          <label for="email"></label>
          <input type="email" name="email" id="email" placeholder="Email" required>
          <button class="btn btn--outline-light">Subscribe</button>
        @endif
      </div>

      <div class="copyright">
        Copyright {{ date('Y') }} <a href="https://whitecanvasdesign.ca/">White Canvas Design Inc.</a> |

        @php
          $menu_name = 'Footer Menu';
          $menu_object = wp_get_nav_menu_object($menu_name);
          $menu_term_id = $menu_object->term_id;
          $args = array(
              'menu' => $menu_term_id,
          );
        @endphp

        @isset($menu_term_id)
          {!! wp_nav_menu($args) !!}
        @endisset
      </div>
    </div>
  </div>
</footer>

