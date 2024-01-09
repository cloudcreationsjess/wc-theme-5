<header class="banner" id="header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
  <div class="header-container">
    @php
      $logo = get_field('banner_logo', 'options')
    @endphp
    @if($logo)
      <a class="header__site-branding header__left" href="{{ esc_url(home_url('/')) }}"
        title="{{ esc_attr(get_bloginfo('name', 'display')) }}" rel="home"
        tabindex="0" aria-label="Home">
        {!! the_image($logo, '', 'medium', 'medium_large') !!}
      </a>
    @endif

    <div class="header__right">
      @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-menu', 'echo' => false]) !!}
        </nav>
      @endif

      @if(get_field('button', 'options'))
        @php
          $btn = get_field('button', 'options')
        @endphp
        <a class="btn btn--primary" href="{{ $btn['url'] }}" tabindex="0">{!! $btn['title'] !!}</a>
      @endif
    </div>

  </div>

</header>
