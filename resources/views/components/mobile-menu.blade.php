<nav id="popout" class="mobile-menu" style=
  "display:none;">
  <div id="site-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'mobile-menu', 'depth' => 3, 'echo' => false]) !!}
    @endif
  </div>
  @if(get_field('mobile_menu_button', 'options'))
    @php
      $btn = get_field('mobile_menu_button', 'options')
    @endphp
    <a class="btn btn--primary" href="{{ $btn['url'] }}">{{ $btn['title'] }}</a>
  @endif
</nav>
