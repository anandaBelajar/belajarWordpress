<?php

/*
Template Name: Special Layout
*/

get_header();

if (have_posts()) : //check if there are post or not
    while (have_posts()) : the_post(); ?>

        <article class="post page">
            <h2><?php the_title() //wordpress function to show title 
                ?></h2>
            <!--info-box -->
            <div class="info-box">
                <h4>Disclaimer Title</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta sodales augue, consequat pulvinar augue blandit a. Vestibulum pharetra augue vitae venenatis eleifend. </p>
            </div>
            <!--info-box-->
            <p><?php the_content() //wordpress function to show content 
                ?></p>
        </article>

<?php endwhile;

else :

    echo '<p>no content found</p>';

endif;

get_footer();

?>