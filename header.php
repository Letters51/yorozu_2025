<?php

/**
 * The header for our theme
 *
 * @package scratch
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Analitics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171485058-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-171485058-1');
    </script>
    <!-- set title-->
    <?php if (is_front_page()) :
        $page_title = esc_html__(get_bloginfo('name')) . ' - 中小企業・小規模事業者のための無料経営相談所';
        $page_desc = esc_html__(get_bloginfo('description'));
    ?>
    <?php elseif (is_archive()) :
        $page_title = esc_html__(get_the_archive_title()) . ' - ' . esc_html__(get_bloginfo('name'));
        $page_desc = wp_strip_all_tags(get_the_archive_description('', ''));
    ?>
    <?php elseif (is_single() && 'casestudy' == get_post_type()) :
        $page_title = (esc_html__(get_post_meta(get_the_ID(), "meta-box-ttl", true)) != "") ? esc_html__(get_post_meta(get_the_ID(), "meta-box-ttl", true)) : esc_html__(get_the_title()) . ' - ' . esc_html__(get_bloginfo('name'));
        $page_desc = "茨城県よろず支援拠点の活用事例集です。 実際に当拠点にご相談いただいた中小企業・小規模事業者の売上拡大、経営改善、IT活用などあらゆるお悩みを解決した活用事例を掲載していますので、参考になさってください。";
    ?>
    <?php elseif (true) :
        $page_title = (esc_html__(get_post_meta(get_the_ID(), "meta-box-ttl", true)) != "") ? esc_html__(get_post_meta(get_the_ID(), "meta-box-ttl", true)) : esc_html__(get_the_title()) . ' - ' . esc_html__(get_bloginfo('name'));
        $page_desc = (esc_html__(get_post_meta(get_the_ID(), "meta-box-des", true)) != "") ? esc_html__(get_post_meta(get_the_ID(), "meta-box-des", true)) : esc_html__(get_the_excerpt());
        //fall back to the default as not set.
    ?>
    <?php endif;

    if ($page_desc == "") {
        $page_desc = esc_html__(get_bloginfo('description'));
    }
    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>

    <!-- single or page -->
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_desc; ?>">

    <meta charset=" <?php bloginfo('charset'); ?>">
    <meta id="viewport-meta" name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0" />
    <?php if (is_single() && 'coordinator' == get_post_type()) : ?>
        <meta name='robots' content='noindex, nofollow' />
    <?php endif; ?>


    <!-- icon and favicon loading -->
    <link rel="apple-touch-icon" size="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon/favicon-16x16.png" />

    <!-- ogp setting  -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:description" content="<?php echo $page_desc; ?>" />
    <meta property="og:site_name" content="<?php echo $page_title; ?>" />
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <?php if (has_post_thumbnail()) : ?>
        <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" />
    <?php else : ?>
        <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/ogp.jpg" />
    <?php endif; ?>


    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <!-- scratch unique css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css?ver=<?php echo _S_VERSION; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/base.min.css?ver=<?php echo _S_VERSION; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.min.css?ver=<?php echo _S_VERSION; ?>">
    <?php if (!is_front_page()) : ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/blog.min.css?ver=<?php echo _S_VERSION; ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page.min.css?ver=<?php echo _S_VERSION; ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/add.css?ver=<?php echo _S_VERSION; ?>">


    <?php wp_head(); ?>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=Array.prototype.includes"></script> -->
    <script type="text/javascript" src="https://webfonts.xserver.jp/js/xserver.js"></script>
    <?php
    if (!empty(get_option('inhead_manager'))) {
        echo htmlspecialchars_decode(get_option('inhead_manager'), ENT_QUOTES);
    }
    ?>
</head>

<body <?php body_class(); ?>>
    <div class="banner_area singo_maru">
        <a href="<?php echo home_url(); ?>/coronalink/" class="banner_area__half">
            <div class="banner_area__text banner_area__text--link">
                <p class="banner_area__large">補助金・施策一覧<span>（直リン）</span></p>
            </div>
        </a>
        <a href="<?php echo home_url(); ?>/cooperation/" class="banner_area__half">
            <div class="banner_area__text banner_area__text--coope">
                <p class="banner_area__large">連携機関一覧</p>
            </div>
        </a>
    </div>

    <?php wp_body_open(); ?>
    <div id="page" class="container container--np">
        <header id="masthead">
            <div class="header">
                <div class="header__upper container__inner">
                    <div class="logo_area">
                        <div class="site-branding">
                            <a href="<?php echo home_url(); ?>" class="custom-logo-link" rel="home" aria-current="page">
                                <img width="80" height="81" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/top_logo@2x.png 2x,<?php echo get_template_directory_uri(); ?>/assets/images/common/top_logo@1x.png 1x" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/top_logo@1x.png" alt="茨城よろず支援拠点ロゴ">
                            </a>
                            <!--<?php
                                the_custom_logo();
                                if (is_front_page() && is_home()) :
                                ?>
                                <h1 class="site-branding__title site-title singo_maru"><a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                                else :
                            ?>
                                <p class="site-branding__title site-title singo_maru"><a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                                endif;
                                $scratch_description = get_bloginfo('description', 'display');
                                if ($scratch_description || is_customize_preview()) :
                            ?>
                                <p class="site-branding__description site-description"><?php echo $scratch_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                                        ?></p>
                            <?php endif; ?>-->
                        </div><!-- .site-branding -->
                        <div class="site_name">
                            <p class="site_name__rub">中小企業・小規模事業者のための無料経営相談所</p>
                            <?php if (is_front_page()) : ?>
                                <a href="<?php echo home_url(); ?>">
                                    <h1 class="singo_maru">茨城県よろず支援拠点</h1>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo home_url(); ?>">
                                    <p class="site_name__title singo_maru">茨城県よろず支援拠点</p>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php get_template_part("inc/global", "address"); ?>
                </div>
                <div class="header__lower">
                    <div class="global_nav container__inner show-pc">
                        <nav id="site-navigation" class="global_nav__menu main-navigation">
                            <div class="global_nav__list_wrap">
                                <ul class="global_nav__list">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => 'global',
                                            'theme_location' => 'primary',
                                            'items_wrap' => '%3$s',
                                            'container' => '',
                                            'link_before' => "<span class='global_nav__list_underline'>",
                                            'link_after' => "</span>",
                                        )
                                    );
                                    ?>
                                </ul>
                                <div class="global_nav__sp_address show-sp">
                                    <?php get_template_part("inc/global", "address"); ?>
                                </div>
                            </div>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->