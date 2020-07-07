        <footer class="site-footer">
            <?php if(get_theme_mod('lwp-footer-callout-display') == 'Yes'){?>
            <div class="footer-callout clearfix">
             
                <div class="footer-callout-image">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-footer-callout-image')); ?>">
                </div>
                <div class="footer-callout-text">
                <h2><a href="<?php echo get_permalink(get_theme_mod('lwp-footer-callout-link')); ?>"><?php echo get_theme_mod('lwp-footer-callout-headline') ?></a></h2>
                <?php echo wpautop(get_theme_mod('lwp-footer-callout-text')); ?>
                </div>
            </div>
            <?php } ?>
            <div class="footer-widget clearfix">
                <?php if (is_active_sidebar('footer1')) { ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer1'); ?>
                    </div>
                <?php } ?>

                <?php if (is_active_sidebar('footer2')) { ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer2'); ?>
                    </div>
                <?php } ?>

                <?php if (is_active_sidebar('footer3')) { ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer3'); ?>
                    </div>
                <?php } ?>

                <?php if (is_active_sidebar('footer4')) { ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer4'); ?>
                    </div>
                <?php } ?>
            </div>

            <nav class="site-nav">
                <?php
                
                //untuk membedak menu item header nav dan footer nav
            //kita butakan masing - masing nav array yang memuat theme location
            //nantinya pada admin dashnboorad kita dapat mennetukan menu item akan dilettakan pada theme location yang mana
            //untuk mengatur menu yang mana diletakkan dimana kita dapatt ke dashboar ke bagian appearance menu lalu kita dapat memlih pages mana kan diletakkan dilaction mana 'ptmary' ato 'footer'

                $args = array(
                    'theme_location' => 'footer'
                );

                ?>
                <?php wp_nav_menu($args); //function to inclue menu //edt the menu item in admin  dashboard appearance menu
                ?>
            </nav>
            <?php bloginfo('name'); //get web anme ?> -&copy; <?php echo date('Y');  //get current date ?>
        </footer>
        <?php wp_footer(); //let wordpress to add codes automatical in footer ?>
        </div>
        </body>

        </html>
