<?php

get_header();
?>
<div class="site-content clearfix">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :

        echo '<p>No content found</p>';

    endif;
    ?>
    <div class="home-columns clearfix">
        <div class="one-half">
            <?php
            /*opinion loops begin here*/
            $opinionPosts = new WP_Query('cat=10&posts_per_page=2%&order=DESC'); //select only 2 post wuth opinion category. opnion category has an id of 10
            if ($opinionPosts->have_posts()) :
                while ($opinionPosts->have_posts()) : $opinionPosts->the_post();
            ?>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                    <?php the_excerpt() ?>
            <?php
                endwhile;
            else :
            endif;
            ?>
        </div>

        <div class="one-half last">
            <?php

            wp_reset_postdata(); //always use this after making a custom query loop to preventour custom query loop distracting default query loop

            $newsPosts = new WP_Query('cat=11&posts_per_page=2%&order=DESC'); //select only 2 post wuth opinion category. opnion category has an id of 10
            if ($newsPosts->have_posts()) :
                while ($newsPosts->have_posts()) : $newsPosts->the_post();
            ?>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                    <?php the_excerpt() ?>
            <?php
                endwhile;
            else :



            endif;
            wp_reset_postdata(); //always use this after making a custom query loop to preventour custom query loop distracting default query loop
            ?>

        </div>
    </div>
</div>

<?php
get_footer();

?>