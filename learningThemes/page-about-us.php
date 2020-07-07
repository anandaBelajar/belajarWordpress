<?php

get_header();

if (have_posts()) : //check if there are post or not
    while (have_posts()) : the_post(); ?>
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
?>

<h1>Blog Posts About Us</h1>
<?php

    $ourCurrentPage = get_query_var('paged');

    $aboutPosts = new WP_Query(array(
        'category_name' => 'About',
        'posts_per_page' => 3,
        'paged' => $ourCurrentPage
    ));

    if($aboutPosts->have_posts()):
        while($aboutPosts->have_posts()):
            $aboutPosts->the_post();
          ?> 
           <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
<?php
        endwhile;
        /*
        previous_posts_link();
        next_posts_link('Next page', $aboutPosts->max_num_pages);
        */
        echo paginate_links(array(
            'total' => $aboutPosts->max_num_pages
        ));
    endif;

    wp_reset_postdata();
?>

<?php


else :

    echo '<p>no content found</p>';

endif;

get_footer();

    ?>