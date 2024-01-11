@php
  $footerLogo = get_field('footer_logo', 'option');
  $footerContactInfo = get_field('footer_contact_info', 'option');
  $socialLinks = get_field('social_links', 'option');
  $contactFormTitle = get_field('contact_form_title', 'option');
  $contactFormEmbed = get_field('contact_form_embed', 'option');
@endphp
<footer id="footer" class="content-info" role="contentinfo">
  <div class="container">
    <div class="footer-left">
      <a href="{{ home_url('/') }}" class="footer-logo">
        <img src="{{ $footerLogo['url'] }}" alt="{{ $footerLogo['alt'] }}">
      </a>
      <div class="footer-contact-info">
        <a href="tel:{!! $footerContactInfo['phone'] !!}" class="phone">{!! $footerContactInfo['phone'] !!}</a>
        <a href="mailto:{!! $footerContactInfo['email'] !!}" class="email">{!! $footerContactInfo['email'] !!}</a>
        <a href="{!! $footerContactInfo['map_link'] !!}">{!! $footerContactInfo['address'] !!}</a>
        <div class="footer-social-links">
          @if($socialLinks)
            @foreach ($socialLinks as $socialLink)
              @if($socialLink['social_link'])
                <a href="{{ $socialLink['social_link'] }}" target="_blank" class="footer-social-link">
                  @if($socialLink['social_icon'])
                    {!! the_image($socialLink['social_icon'], 'icon', 'thumbnail', 'thumbnail') !!}
                  @endif
                </a>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </div>

    <div class="footer-contact-container footer-right">
      <h3 class="footer-title">{{ $contactFormTitle }}</h3>
      <div class="contact-form">
        {!! $contactFormEmbed !!}
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

        {!! wp_nav_menu($args) !!}
      </div>
    </div>
  </div>
</footer>
