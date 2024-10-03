<?php

/**
 * The template for displaying the footer
 *
 * @package scratch
 */

?>
<?php if (!is_page('inquiry')) : ?>
    <?php get_template_part('elements/cta'); ?>
<?php endif; ?>
<?php get_template_part('elements/sns'); ?>
<footer id="footer">
    <div class="footer">
        <div class="footer-top container">
            <div class="container__inner">
                <div class="footer-top__content">
                    <div class="footer__item footer__company"><?php dynamic_sidebar('フッター1'); ?></div>
                    <div class="footer__item show-pc"><?php dynamic_sidebar('フッター2'); ?></div>
                    <!--<div class="footer__item show-pc"><?php dynamic_sidebar('フッター3'); ?></div>-->
                    <div class="footer__item show-pc"><?php dynamic_sidebar('フッター4'); ?></div>
                    <div class="footer__item show-pc"><?php dynamic_sidebar('フッター5'); ?></div>
                </div>

                <div class="footer-banner">
                    <ul class="footer-banner__list">
                        <li><a href="https://www.chusho.meti.go.jp/" target="__blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/tyusyo.png" alt="中小企業庁"></a></li>
                        <li><a href="https://www.kanto.meti.go.jp/" target="__blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/kntokeizai.png" alt="関東経済産業局"></a></li>
                        <li><a href="https://yorozu.smrj.go.jp/" target="__blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/yorozu.png" alt="よろず支援拠点"></a></li>
                        <li><a href="https://www.iis-net.or.jp/" target="__blank" rel="noopener noreferrer"><img srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/koueki.png 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/koueki@2x.png 2x" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/koueki.png" alt="いばらき中小企業グローバル推進機構"></a></li>
                        <li><a href="https://www.icgc.or.jp/" target="__blank" rel="noopener noreferrer"><img srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/sinyou.png 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/sinyou.png 2x" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/sinyou.png" alt="茨城県信用保証協会"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom container container--np">
            <div class="footer-bottom__body container__inner">
                <ul class="footer-bottom__menu">
                    <li><a href="<?php echo home_url(); ?>/precheck">ご利用いただく際の留意事項</a></li>
                    <li><a href="<?php echo home_url(); ?>/privacy">プライバシーポリシー</a></li>
                    <li>
                        <script type="text/javascript" src="//seal.securecore.co.jp/js/ss_130-50.js"></script><noscript><img src="//seal.securecore.co.jp/image/noscript_130x50.png"></noscript>
                    </li>
                </ul>
                <div class="copy">
                    <small id="copy-right" class="copy__site-info"><?php esc_html_e(get_theme_mod('company-copyright'), 'scratch'); ?></small>
                </div><!-- .site-info -->
            </div>
        </div>
    </div>
</footer><!-- #footer -->
<a id="back_to_top" class="back_to_top js-to-top" href="#top">
    <svg xmlns="https://www.w3.org/2000/svg" width="19.456" height="7.834" viewBox="0 0 19.456 7.834" role="img" aria-label="上向き矢印（トップへ戻る）">
        <path id="Path_502" data-name="Path 502" d="M558.2,336.428l9.728-6.221,9.728,6.221v1.612l-9.728-6.221-9.728,6.221Z" transform="translate(-558.196 -330.207)" fill="#fff"></path>
    </svg>
</a>
<button id="sp-menu-toggle" class="hamburger hamburger--squeeze show-sp" title="メニュー">
    <span class="hamburger-box">
        <span class="hamburger-inner"></span>
    </span>
    <span class="hamburger-box__txt">メニュー</span>
</button>
</div><!-- #page -->

<?php wp_footer(); ?>

<script defer src='<?php echo get_template_directory_uri(); ?>/assets/js/sp-menu.js'></script>
<script defer src='<?php echo get_template_directory_uri(); ?>/assets/js/yorozu.js?ver=<?php echo _S_VERSION;?>'></script>
<!-- tag right before body opens -->
<?php
if (!empty(get_option('beforebody_manager'))) {
    echo htmlspecialchars_decode(get_option('beforebody_manager'), ENT_QUOTES);
}
?>
</body>

</html>