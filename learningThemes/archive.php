<?php

get_header();

if (have_posts()) : //check if there are post or not
?>

    <h2><?php

        if (is_category()) { //chech if it is in a category or not
            single_cat_title();
        } else if (is_tag()) {
            single_tag_title();
        } else if (is_author()) {
            the_post();
            echo 'Author Archives: ' . get_the_author();
            rewind_posts();
        } else if (is_day()) {
            echo 'Daily Archives: ' . get_the_date();
        } else if (is_month()) {
            echo 'Monthhly Archives: ' . get_the_date('F Y');;
        } elseif (is_year()) {
            echo 'Yearly Archives: ' . get_the_date('Y');
        } else {
            echo 'Archives:';
        }
        ?></h2>

    <?php

    while (have_posts()) : the_post();


        get_template_part('content', get_post_format()); //get the content.php inluded here
    ?>



<?php endwhile;

echo paginate_links();

else :

    echo '<p>no content found</p>';

endif;

get_footer();

?>