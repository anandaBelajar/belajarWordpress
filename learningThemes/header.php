<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width = device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); //let worddpress add automatically it code after the code that we addded ?>
    <head>
    <body <?php body_class(); ?>>
    <div class="container">
    <header class="site-header">

        <div class="hd-search">
            <?php get_search_form()?>
        </div>
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
        
        <h3><?php bloginfo('description') ?><?php if(is_page('portofolio')){ ?>
            - thank you for viewing our work
        <?php } ?></h3>
        <?php 
        
        //untuk membedak menu item header nav dan footer nav
            //kita butakan masing - masing nav array yang memuat theme location
            //nantinya pada admin dashnboorad kita dapat mennetukan menu item akan dilettakan pada theme location yang mana
            //untuk mengatur menu yang mana diletakkan dimana kita dapatt ke dashboard ke bagian appearance menu lalu kita dapat memlih pages mana kan diletakkan dilaction mana 'ptmary' ato 'footer'
                
                $args = array(
                    'theme_location' => 'primary'
                );
                
                ?>
    <nav class="site-nav">
       <?php wp_nav_menu($args); //function to inclue menu //edt the menu item in admin  dashboard appearance menu ?>
    </nav>
    </header>
