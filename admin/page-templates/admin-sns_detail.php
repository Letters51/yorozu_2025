<?php

/**
 *
 * @package scratch
 */
?>

<div class="wrap">
    <h1>SNS設定</h1>
    <?php settings_errors(); ?>


    <ul class="nav nav-tabs">
        <li class="active nav-tabs__element"><a href="#tab-1">タグ関係</a></li>

    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-content__pane active">
            <form method="post" action="options.php">
                <?php
                settings_fields('sns_settings');
                do_settings_sections('sns_detail');
                submit_button();
                ?>
            </form>
        </div>

    </div>

</div>