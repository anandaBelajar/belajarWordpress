<?php

get_header(); get_header(); //memanggil header header
 ?>

<div class="site-content clearfix">

    <div class="main-column">
        <?php if(current_user_can('administrator')): ?>
        <div class="admin-quick-add">
            <h3>Quick Add Post</h3>
            <input type=text name="title" placeholder="Title">
            <textarea name="content" placeholder="content"></textarea>
            <button id="quick-add-button">Create Post</button>
        </div>
        <?php endif ?>
        <?
        //menampilkan posts
        if (have_posts()) : //check if there are post or not
            while (have_posts()) : the_post(); //selama adapost tampilkan post

                get_template_part('content', get_post_format()); //get the content.php inluded here
                //get_post_format function will get the format of the post
                //in this case when get_post_format functionassigned in get_template_part
                //it will get the template that related to a format of a post
                //in this wordpress app it will call content-aside.php, content-link.php, content-gallery.php
        ?>
        <?php endwhile;

        /*
        //these two function used for go to next page and previous page
        previous_posts_link();
        next_posts_link();
            */
        
            echo paginate_links();

        else :

            echo '<p>no content found</p>';

        endif; ?>
    </div>

    <?php get_sidebar()?>


</div>


<?php get_footer(); //memanggil footer

?>
