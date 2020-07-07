<?php

function learningWordPress_resources()
{

    wp_enqueue_style('style', get_stylesheet_uri()); //include the style.css
    //wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);
    wp_localize_script('main_js', 'magicalData', array(
        'nonce' => wp_create_nonce('wp_rest'), 
        'siteURL' => get_site_url()
    ));
}



add_action('wp_enqueue_scripts', 'learningWordPress_resources'); //call the learningWordpress_resource function to be able to run it



/*get top ancestor*/

function get_top_ancestor_id()
{

    global $post;

    if ($post->post_parent) { //chek if a post has a parent or not    

        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }


    return $post->ID;
}

/*does page have children*/
function has_children()
{

    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

/*Customize excertp word count length*/
function ld_custom_excerpt_length()
{
    return 25;
}
add_filter('excerpt_length', 'ld_custom_excerpt_length');


//theme setup
function learningWordPress_setup()
{
    //Navigation Menus
    register_nav_menus(array( //tambahkan theme menu location agar di admin dashboar kita dapat menntukan suatu menu item akan ditaurh di bagian nav heaader ato anv footer
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));
    /*add featured image support*/
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true); //180 is width, 120 is height //true paramater to turn on the hard crop of wordpress to keep image in set aspect ratio
    add_image_size('banner-image', 920, 210, array('left', 'top')); //array(left, top) //will crop the top left of the image
    /*add post format*/
    //tehre are several default post format in wordpress such as aside, gallery, link, image, quote, status, video, audio, chat
    add_theme_support('post-formats', array('aside', 'gallery', 'link')); //assign post format tha we will use aside, gallery, link

}

add_action('after_setup_theme', 'learningWordPress_setup');

/*add our widget location*/
function arphabet_widgets_init()
{

    register_sidebar(array(
        'name'          => 'sidebar',
        'id'            => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title' => '<h4 class="my-special-class">',
        'after_title' => '</h4>'

    ));

    register_sidebar(array(
        'name'          => 'footer area 1',
        'id'            => 'footer1'

    ));

    register_sidebar(array(
        'name'          => 'footer area 2',
        'id'            => 'footer2'

    ));

    register_sidebar(array(
        'name'          => 'footer area 3',
        'id'            => 'footer3'

    ));

    register_sidebar(array(
        'name'          => 'footer area 4',
        'id'            => 'footer4'

    ));
}
add_action('widgets_init', 'arphabet_widgets_init');

/*customize appearance options*/
function learningWordPress_customize_register($wp_customize)
{
    $wp_customize->add_setting('lwp_link_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',

    ));

    $wp_customize->add_setting('lwp_btn_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',

    ));

    $wp_customize->add_section('lwp_santard_colors', array(
        'title' => __('Standard Colors', 'LearningWordpress'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
        'label' => __('link Color', 'LearningWordPress'),
        'section' => 'lwp_santard_colors',
        'settings' => 'lwp_link_color'
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_btn_color_control', array(
        'label' => __('Button Color', 'LearningWordPress'),
        'section' => 'lwp_santard_colors',
        'settings' => 'lwp_btn_color'
    )));
}

add_action('customize_register', 'learningWordPress_customize_register');

/*output customize function*/
function learningWordPress_customize_css()
{ ?>
    <style type="text/css">
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>;

        }

        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited {
            background-color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }

        div.hd-search #searchsubmit{
            background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>
        }
    </style>
<?php
}

add_action('wp_head', 'learningWordPress_customize_css');

//add footer callout section to admin appearance screen
function lwp_footer_callout($wp_customize){
    
    $wp_customize->add_section('lwp-footer-callout-section', array(
        'title' => 'Footer Callout'
    ));


    $wp_customize->add_setting('lwp-footer-callout-display', array(
        'default' => 'no',

    ));

    

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-dsiplay-control', array(
        'label' => 'Display this section?',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-display',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes')
    )));

    $wp_customize->add_setting('lwp-footer-callout-headline', array(
        'default' => 'Example Headline Text',

    ));

    

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
        'label' => 'Headline',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-headline'
    )));

    $wp_customize->add_setting('lwp-footer-callout-text', array(
        'default' => 'Example Paragraph Text',

    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
        'label' => 'Text',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-text',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('lwp-footer-callout-link');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
        'label' => 'Link',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-link',
        'type' => 'dropdown-pages'
    )));

    $wp_customize->add_setting('lwp-footer-callout-image');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
        'label' => 'Image',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-image',
        'width' => 750,
        'heiaght' => 500
    )));
}

add_action('customize_register', 'lwp_footer_callout');
