<?php get_header(); ?>
<div class="container-histories">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <div class="single-history-archive">
                <h1><?php the_title(); ?></h1>
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
            </div>
            <?php endwhile;
            endif;
            ?>
</div>
    <?php get_footer(); ?>