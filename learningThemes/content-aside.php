<?php
//this file will be called in index.php by function get_post_format();
?>

<article class="post post-aside">
    <p class="mini-meta"><?php the_author(); ?> @ <?php the_time('F j, Y') ?>  </p>
    <?php the_content() ?>
</article>

