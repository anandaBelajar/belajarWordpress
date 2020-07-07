<?php

get_header();

if (have_posts()) : //check if there are post or not
    while (have_posts()) : the_post(); ?>

        <article class="post page">
            <!-- column-container -->
            <div class="column-container clearfix">
                <div class="title-column">
                    <h1><?php the_title() ?></h1>
                </div>
                <div class="text-column">
                    <p><?php the_content() //wordpress function to show content 
                        ?></p>
                    <button id="portofolio-posts-btn">Load portofolio related blog posts</button>
                    <div id="portofolio-posts-container">
                    </div>
                </div>

            </div>
            <!--column-container-->


        </article>

<?php endwhile;



else :

    echo '<p>no content found</p>';

endif;

get_footer();

?>