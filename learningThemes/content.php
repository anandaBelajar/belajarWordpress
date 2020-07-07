<article class="post <?php if (has_post_thumbnail()) { ?> has-thumbnail<?php }  ?>">
    <div class="post-thumbnail">
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
    </div>
    <h2><a href="<?php the_permalink() //php function to link to a post 
                    ?>"><?php the_title(); //tampilkan judu dari post
                        ?></a></h2>



    <p class="post-info"><?php the_time('F jS, Y g: i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in <?php $categories = the_category(', '); ?>

    </p>

    <?php
    if (is_search() OR is_archive()) { ?>

        <p><?php echo get_the_excerpt(); //wordpress function to show summary of content 
            ?><a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>

        <?php } else {

        if ($post->post_excerpt) { //check if a post has an exceprt or not
        ?>
            <p><?php echo get_the_excerpt(); //wordpress function to show summary of content 
                ?><a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
    <?php
        } else {
            //if the post doesnt has an exceprt it will show it full content
            the_content();
        }
    } ?>




</article>
