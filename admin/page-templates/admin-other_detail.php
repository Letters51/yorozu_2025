<?php

/**
 *
 * @package scratch
 */
?>

<div class="wrap">
    <h1>高度な設定</h1>
    <?php settings_errors(); ?>


    <ul class="nav nav-tabs">
        <li class="active nav-tabs__element"><a href="#tab-1">タグ関係</a></li>
        <li class="nav-tabs__element"><a href="#tab-2">予備（今後拡張）</a></li>
        <li class="nav-tabs__element"><a href="#tab-3">予備（今後拡張）</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-content__pane active">
            <form method="post" action="options.php">
                <?php
                settings_fields('ga_settings');
                do_settings_sections('other_detail');
                submit_button();
                ?>
            </form>
        </div>

        <div id="tab-2" class="tab-content__pane">
            <form method="post" action="options.php">
                <?php

                ?>
            </form>
        </div>
        <div id="tab-3" class="tab-content__pane">
            <form method="post" action="options.php">
                <?php

                ?>
            </form>
        </div>
    </div>

</div>