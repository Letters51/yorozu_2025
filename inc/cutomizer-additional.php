<?php

/**
 *
 * @package scratch
 */

/****
 * Register Our Customizer Stuff Here
 */
function scratch_register_theme_customizer_info($wp_customize)
{

    /******************************************************************
     * add to header image
     ******************************************************************/
    // Add setting
    $wp_customize->add_setting('header-image-pc-upload', array(
        'sanitize_callback' => 'absint'
    ));


    // Add control
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'header-image-pc',
            array(
                'label'      => __('PCメイン画像アップロード', 'scratch'),
                'description' => __('PC表示の時に表示される画像をしていできます。現在ランダム表示はPCでは非対応です。'),
                'section'    => 'header_image',
                'settings'   => 'header-image-pc-upload',
                'width'  => 2400,
                'height' => 750,
                'flex_width' => true,
                'flex_height' => true
            )
        )
    );


    /******************************************************************
     * company info
     ******************************************************************/
    // Add section.
    $wp_customize->add_section('company-info', array(
        'title' => __('事業所情報', 'scratch'),
        'priority' => 20
    ));

    // Add setting
    $wp_customize->add_setting('company-name', array(
        'default' => __('事業所名・屋号', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));


    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-name', //give it an ID
            array(
                'label' => __('事業所名・屋号', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-name' //pick the setting it applies to
            )
        )
    );


    // Add setting
    $wp_customize->add_setting('company-post-number', array(
        'default' => __('000-0000', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-post-number', //give it an ID
            array(
                'label' => __('郵便番号', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-post-number' //pick the setting it applies to
            )
        )
    );

    // Add setting
    $wp_customize->add_setting('company-place', array(
        'default' => __('○○件○○市', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-place', //give it an ID
            array(
                'label' => __('所在地1', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-place' //pick the setting it applies to
            )
        )
    );

    // Add setting
    $wp_customize->add_setting('company-place-sub', array(
        'default' => __('○○ビル', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-place-sub', //give it an ID
            array(
                'label' => __('所在地2', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-place-sub' //pick the setting it applies to
            )
        )
    );

    // Add setting
    $wp_customize->add_setting('company-map', array(
        'default' => __('mapURL', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-map', //give it an ID
            array(
                'label' => __('googleマップURL', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-map' //pick the setting it applies to
            )
        )
    );

    // Add setting
    $wp_customize->add_setting('company-tel', array(
        'default' => __('000-0000-0000', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-tel', //give it an ID
            array(
                'label' => __('電話番号', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-tel' //pick the setting it applies to
            )
        )
    );

    // Add setting
    $wp_customize->add_setting('company-copyright', array(
        'default' => __('(c)', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'company-copyright', //give it an ID
            array(
                'label' => __('コピーライト', 'scratch'), //set the label to appear in the Customizer
                'section' => 'company-info', //select the section for it to appear under
                'settings' => 'company-copyright' //pick the setting it applies to
            )
        )
    );


    /************************************************************
     * 3PR
     ************************************************************/
    // Add section.
    $wp_customize->add_section('three-pr', array(
        'title' => __('3PRブロック', 'scratch'),
        'priority' => 20
    ));

    // Add setting　ブロック01画像
    $wp_customize->add_setting('three-pr-pic-01', array(
        'default' => __('ブロック01画像', 'scratch'),
        'sanitize_callback' => 'absint'
    ));

    // Add control　ブロック01画像
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'three-pr-pic-01', //give it an ID
            array(
                'label' => __('ブロック01画像', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-pic-01' //pick the setting it applies to
            )
        )
    );

    // Add setting　ブロック01タイトル
    $wp_customize->add_setting('three-pr-ttl-01', array(
        'default' => __('ブロック01タイトル', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック01タイトル
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-ttl-01', //give it an ID
            array(
                'label' => __('ブロック01タイトル', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-ttl-01', //pick the setting it applies to
                'width'  => 300,
                'height' => 300,
                'flex_width' => true,
                'flex_height' => true
            )
        )
    );

    // Add setting　ブロック01文章
    $wp_customize->add_setting('three-pr-txt-01', array(
        'default' => __('ブロック01文章', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック01文章
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-txt-01', //give it an ID
            array(
                'label' => __('ブロック01文章', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-txt-01', //pick the setting it applies to
                'type' => 'textarea'
            )
        )
    );

    // Add setting　ブロック02画像
    $wp_customize->add_setting('three-pr-pic-02', array(
        'default' => __('ブロック02画像', 'scratch'),
        'sanitize_callback' => 'absint'
    ));

    // Add control　ブロック02画像
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'three-pr-pic-02', //give it an ID
            array(
                'label' => __('ブロック02画像', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-pic-02',
                'width'  => 300,
                'height' => 300,
                'flex_width' => true,
                'flex_height' => true //pick the setting it applies to
            )
        )
    );

    // Add setting　ブロック02タイトル
    $wp_customize->add_setting('three-pr-ttl-02', array(
        'default' => __('ブロック02タイトル', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック02タイトル
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-ttl-02', //give it an ID
            array(
                'label' => __('ブロック02タイトル', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-ttl-02' //pick the setting it applies to
            )
        )
    );

    // Add setting　ブロック02文章
    $wp_customize->add_setting('three-pr-txt-02', array(
        'default' => __('ブロック02文章', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック02文章
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-txt-02', //give it an ID
            array(
                'label' => __('ブロック02文章', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-txt-02', //pick the setting it applies to
                'type' => 'textarea'
            )
        )
    );

    // Add setting　ブロック03画像
    $wp_customize->add_setting('three-pr-pic-03', array(
        'default' => __('ブロック03画像', 'scratch'),
        'sanitize_callback' => 'absint'
    ));

    // Add control　ブロック03画像
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'three-pr-pic-03', //give it an ID
            array(
                'label' => __('ブロック03画像', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-pic-03', //pick the setting it applies to
                'width'  => 300,
                'height' => 300,
                'flex_width' => true,
                'flex_height' => true
            )
        )
    );

    // Add setting　ブロック03タイトル
    $wp_customize->add_setting('three-pr-ttl-03', array(
        'default' => __('ブロック03タイトル', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック03タイトル
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-ttl-03', //give it an ID
            array(
                'label' => __('ブロック03タイトル', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-ttl-03' //pick the setting it applies to
            )
        )
    );

    // Add setting　ブロック03文章
    $wp_customize->add_setting('three-pr-txt-03', array(
        'default' => __('ブロック03文章', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control　ブロック03文章
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'three-pr-txt-03', //give it an ID
            array(
                'label' => __('ブロック03文章', 'scratch'), //set the label to appear in the Customizer
                'section' => 'three-pr', //select the section for it to appear under
                'settings' => 'three-pr-txt-03', //pick the setting it applies to
                'type' => 'textarea'
            )
        )
    );

    /****************************************************************
     * CTA
     ****************************************************************/
    // Add section CTA.
    $wp_customize->add_section('cta', array(
        'title' => __('CTA', 'scratch'),
        'priority' => 30
    ));

    // Add setting 対応時間
    $wp_customize->add_setting('cta-time', array(
        'default' => __('対応時間', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control 対応時間
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cta-time', //give it an ID
            array(
                'label' => __('00:00～00:00', 'scratch'), //set the label to appear in the Customizer
                'section' => 'cta', //select the section for it to appear under
                'settings' => 'cta-time' //pick the setting it applies to
            )
        )
    );



    // Add setting 問い合わせ先URL
    $wp_customize->add_setting('cta-url', array(
        'default' => __('問い合わせ先URL', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control 問い合わせ先URL
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cta-url', //give it an ID
            array(
                'label' => __('url', 'scratch'), //set the label to appear in the Customizer
                'section' => 'cta', //select the section for it to appear under
                'settings' => 'cta-url' //pick the setting it applies to
            )
        )
    );



    // Add setting お問い合わせボタン文言
    $wp_customize->add_setting('cta-button-text', array(
        'default' => __('お問い合わせボタン文言', 'scratch'),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control お問い合わせボタン文言
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cta-button-text', //give it an ID
            array(
                'label' => __('お問い合わせボタン文言', 'scratch'), //set the label to appear in the Customizer
                'section' => 'cta', //select the section for it to appear under
                'settings' => 'cta-button-text' //pick the setting it applies to
            )
        )
    );


    // Sanitize text
    function sanitize_text($text)
    {
        return sanitize_text_field($text);
    }
}
add_action('customize_register', 'scratch_register_theme_customizer_info');


/**********************************************************************
 * Register PC header image url
 **********************************************************************/
function get_the_pc_image_url()
{
    return wp_get_attachment_image_url(get_theme_mod('header-image-pc-upload'), 'full');
}
