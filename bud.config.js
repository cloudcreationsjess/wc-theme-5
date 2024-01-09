/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/docs/sage sage documentation}
 * @see {@link https://bud.js.org/guides/configure bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/docs/bud.entry}
   * @see {@link https://bud.js.org/docs/bud.assets}
   */
  app
    .entry('app', ['@scripts/app', '@styles/app'])
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .assets(['images', 'fonts']);

  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/docs/bud.setPublicPath}
   */
  app.setPublicPath('/wp-content/themes/sage/public/');

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/docs/bud.setUrl}
   * @see {@link https://bud.js.org/docs/bud.setProxyUrl}
   * @see {@link https://bud.js.org/docs/bud.watch}
   */
  app
    .setUrl('http://localhost:3000')
    .setProxyUrl('http://white-canvas-theme-5.local')
    .watch(['resources/views', 'resources/styles', 'app']);

  /**
   * Generate WordPress `theme.json`
   *
   * @note This overwrites `theme.json` on every build.
   *
   * @see {@link https://bud.js.org/extensions/sage/theme.json}
   * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json}
   */
  app.wpjson.setSettings({
    color: {
      custom: false,
      customDuotone: false,
      customGradient: false,
      defaultDuotone: false,
      defaultGradients: false,
      defaultPalette: false,
      duotone: [],
      palette: [
        {
          name: 'Lightest',
          slug: 'lightest',
          color: '#FFFFFF',
        },
        {
          name: 'Light',
          slug: 'light',
          color: '#EDEDEB',
        },
        {
          name: 'Mid',
          slug: 'mid',
          color: '#CCCCC4',
        },
        {
          name: 'Bright',
          slug: 'bright',
          color: '#2B382C',
        },
        {
          name: 'Darkest',
          slug: 'darkest',
          color: '#222222',
        },
        {
          name: 'Darkest Hover',
          slug: 'dark-hover',
          color: '#545454',
        },
      ],
    },
    custom: {
      spacing: {},
      typography: {
        'font-size': {},
        'line-height': {},
      },
    },
    spacing: {
      padding: true,
      units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
    },
    typography: {
      customFontSize: false,
      fontFamilies: [
        {
          fontFamily: 'Inter',
          name: 'Inter',
          slug: 'inter',
          fontFace: [
            {
              fontFamily: 'Inter',
              fontWeight: '400',
              fontStyle: 'normal',
              src: "url('../../fonts/Inter-Regular.ttf') format('truetype')",
            },
            {
              fontFamily: 'Inter',
              fontWeight: '600',
              fontStyle: 'normal',
              src: "url('../../fonts/Inter-SemiBold.ttf') format('truetype')",
            },
            {
              fontFamily: 'Inter',
              fontWeight: '500',
              fontStyle: 'normal',
              src: "url('../../fonts/Inter-Medium.ttf') format('truetype')",
            },
          ],
        },
        {
          fontFamily: 'Inter Tight',
          name: 'Inter Tight',
          slug: 'inter-tight',
          fallback: 'sans-serif',
          fontDisplay: 'swap',
          fontWeights: [100, 300, 400, 500, 700, 900],
          src: "url('../../fonts/InterTight-VariableFont_wght.ttf') format('truetype')",
        },
        {
          fontFamily: 'Inter Italic',
          name: 'Inter Italic',
          slug: 'inter-italic',
          fallback: 'sans-serif',
          weights: [100, 300, 400, 500, 700, 900],
          fontDisplay: 'swap',
          src: "url('../../fonts/InterTight-VariableFont_wght.ttf') format('truetype')",
        },
      ],
      fontSizes: [
        {
          name: 'H1',
          size: '55px',
          slug: 'h1',
        },
        {
          name: 'H2',
          size: '35px',
          slug: 'h2',
        },
        {
          name: 'H3',
          size: '27px',
          slug: 'h3',
        },
        {
          name: 'H4',
          size: '20px',
          slug: 'h4',
        },
        {
          name: 'H5',
          size: '15px',
          slug: 'h5',
        },
        {
          name: 'Body',
          size: '16px',
          slug: 'body',
        },
        {
          name: 'Mice',
          size: '14px',
          slug: 'mice',
        },
      ],
    },
  });

  app.wpjson
    .setStyles({
      elements: {
        link: {
          color: {
            text: '#222222',
          },
        },
        button: {
          color: {
            background: '#2B382C',
            text: '#FFFFFF',
          },
          border: {
            width: '1px',
            radius: '23px',
          },
          spacing: {
            padding: {
              top: '12px',
              bottom: '12px',
              right: '54px',
              left: '54px',
            },
          },
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '16px',
            fontWeight: '600',
            lineHeight: '25px',
            letterSpacing: '1.6px',
          },
        },
        heading: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontWeight: '500',
          },
          color: {
            text: '#222222',
          },
        },
        h1: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '55px',
            lineHeight: '70px',
            letterSpacing: '-0.55px',
            fontWeight: '500',
          },
        },
        h2: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '35px',
            letterSpacing: '0',
            lineHeight: '45px',
            fontWeight: '500',
          },
        },
        h3: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '27px',
            letterSpacing: '0',
            lineHeight: '32px',
            fontWeight: '500',
          },
        },
        h4: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '20px',
            letterSpacing: '0',
            lineHeight: '25px',
            fontWeight: '600',
          },
        },
        h5: {
          typography: {
            fontFamily: 'Inter, sans-serif',
            fontSize: '15px',
            letterSpacing: '0',
            lineHeight: '25px',
            fontWeight: '400',
          },
        },
      },
      blocks: {
        'core/button': {
          variations: {
            outline: {
              color: {
                background: '#FFFFFF',
                text: '#283329',
              },
              spacing: {
                padding: {
                  top: '12px',
                  bottom: '12px',
                  right: '54px',
                  left: '54px',
                },
              },
              border: {
                width: '1px',
                style: 'solid',
                color: '#222222',
              },
              ':hover': {
                color: {
                  background: '#2B382C',
                  text: '#222222',
                },
              },
            },
            primary: {
              color: {
                background: '#2B382C',
                text: '#FFFFFF',
              },
              ':hover': {
                color: {
                  background: '#FFFFFF',
                  text: '#2B382C',
                },
              },
            },
          },
        },
      },
    })
    .enable();
};
