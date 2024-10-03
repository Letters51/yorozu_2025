<?php

/**
 *
 * @package scratch
 */


$le_cta_info = array(
    'tel' => esc_html__(get_theme_mod('company-tel')),
    'url' => esc_url(get_theme_mod('cta-url')),
    'button-text' => esc_html__(get_theme_mod('cta-button-text')),
    'title' =>  esc_html__(get_bloginfo('name')),
    'post-number' => esc_html__(get_theme_mod('company-post-number')),
    'address' => esc_html__(get_theme_mod('company-place')),
    'open-time' => esc_html__(get_theme_mod('cta-time'))
);

?>
<aside class="cta container<?php if(!is_home())echo " cta--page";?>">
    <div class="container__inner">

        <div class="cta__top">
            <h3 class="cta__title">よろず支援拠点へのご相談</h3>
            <p class="cta__pd">お気軽にお問い合わせください。</p>
            <div class="cta__kinds">
                <a class="cta__btn base_btn base_btn--orange base_btn--cta"
                    href="<?php echo $le_cta_info['url']; ?>"><?php echo $le_cta_info['button-text']; ?></a>
                <div class="cta__telwrapper">
                    <a class="cta__tel"
                        href="tel:<?php echo $le_cta_info['tel']; ?>"><?php echo $le_cta_info['tel']; ?></a>
                    <p class="cta__open-time"><?php echo $le_cta_info['open-time']; ?></p>
                </div>
            </div>
            <!--<div class="cta__top-second">
                <p class="cta__address">
                    <address><?php //echo $le_cta_info['post-number']; 
                                ?><br><?php //echo $le_cta_info['address']; 
                                        ?></address>
                </p>
            </div> hidden-->

        </div>
    </div>
</aside>