<?php

/**
 *
 * @package scratch
 */
?>

<div class="wrap">
    <h1>カスタム投稿タイプ設定</h1>
    <?php settings_errors(); ?>


    <ul class="nav nav-tabs">
        <li class="active nav-tabs__element"><a href="#tab-1">カスタム投稿タイプ01</a></li>
        <li class="nav-tabs__element"><a href="#tab-2">カスタム投稿タイプ02</a></li>
        <li class="nav-tabs__element"><a href="#tab-3">カスタム投稿タイプ03</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-content__pane active">
            <form method="post" action="options.php">
                <?php
                settings_fields('seminar_settings');
                do_settings_sections('custom_post01');
                submit_button();
                ?>
            </form>
        </div>

        <div id="tab-2" class="tab-content__pane">
            <form method="post" action="options.php">
                <?php
                settings_fields('casestudy_settings');
                do_settings_sections('custom_post02');
                submit_button();
                ?>
            </form>
        </div>
        <div id="tab-3" class="tab-content__pane">
            <form method="post" action="options.php">
                <?php
                settings_fields('coordinator_settings');
                do_settings_sections('custom_post03');
                submit_button();
                ?>
            </form>
        </div>
    </div>

</div>