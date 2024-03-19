<head>
    {{-- <title><?php wp_title(''); ?></title> --}}
  
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri(); ?>/resources/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_file_uri(); ?>/resources/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_file_uri(); ?>/resources/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_theme_file_uri(); ?>/resources/images/favicon/site.webmanifest" crossorigin="use-credentials">
    <link rel="mask-icon" href="<?php echo get_theme_file_uri(); ?>/resources/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RDVFS4SHKR"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-RDVFS4SHKR');
    </script>

  @php wp_head() @endphp

</head>
