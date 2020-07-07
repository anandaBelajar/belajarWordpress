<?php

get_header();

if(have_posts()): //check if there are post or not
    while(have_posts()) : the_post(); ?>

    <article class="post">
        <h2><a href="<?php the_permalink() //php function to link to a post ?>"><?php the_title(); //wordpress function to show title ?></a></h2> 
        
        <?php the_post_thumbnail('banner-image');?>

        <p class="post-info"><?php the_time('F jS, Y g: i a');?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in <?php $categories = the_category(', ');?>
    
        </p>
        
        <p><?php the_content() //wordpress function to show the content ?></p>
    
        <div class="about-author clearfix">
            <div class="about-author-image">
                <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                <p><?php echo get_the_author_meta('nickname'); ?></p>
            </div>
            <?php $otherAuthorPosts = new WP_Query(array(
                'author' => get_the_author_meta('ID'),
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID())
            )); ?>
            <div class="about-author-text">
                <h3>About The Author</h3>
                <?php echo wpautop(get_the_author_meta('description')) ?>
            </div>

            <?php if($otherAuthorPosts->have_posts()){ ?>
            <div class="other-posts-by">
                <h4>Other posts by<?php echo get_the_author_meta('nickname') ?></h4>
                <ul>
                    <?php  while($otherAuthorPosts->have_posts()) :
                                $otherAuthorPosts -> the_post();
                    ?>
                         <li><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></li>
                    <?php 
                    endwhile;
                        
                    ?>
                   
                </ul>
            </div>
                <?php } 
                
                wp_reset_postdata();
                ?>
                <?php if(count_user_posts(get_the_author_meta('ID')) > 3){ ?>
                <a class="btn-a" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">View all post by <?php echo get_the_author_meta('nickname'); ?></a>
                <?php } ?>
            </div>
    
    </article>
    
    <?php endwhile;

else:

    echo '<p>no content found</p>';

endif;

get_footer();

?>