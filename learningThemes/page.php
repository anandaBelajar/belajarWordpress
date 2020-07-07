<?php

get_header();

if (have_posts()) : //check if there are post or not
    while (have_posts()) : the_post(); ?> <!--Selama ada post tampilkan post-->
        <?php if (has_children() or $post->post_parent > 0) { ?>
            <article class="post page">
                <nav class="site-nav children-links clearfix">
                    <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
                    <ul>
                        <?php

                        $args = array(
                            'child_of' => get_top_ancestor_id(),
                            'title_li' => ''
                        );

                        ?>

                        <?php wp_list_pages($args); ?>
                    </ul>
                </nav>
            <?php } ?>
            <h2><?php the_title() //wordpress function to show title 
                ?></h2>
            <p><?php the_content() //wordpress function to show content 
                ?></p>
            </article>

    <?php endwhile;

else :

    echo '<p>no content found</p>';

endif;

get_footer();

    ?>
