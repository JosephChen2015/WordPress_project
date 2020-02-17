<div class="<?php echo be_themes_get_class( 'post-title-meta' ); ?>">
    <?php get_template_part( 'template-parts/posts/partials/archive-primary', 'meta' ); ?>
    <h1 class="<?php echo be_themes_get_class( 'post-title' ); ?>">
        <a href="<?php the_permalink(); ?>">
            <?php echo the_title(); ?>
        </a>
    </h1>
    <?php get_template_part( 'template-parts/posts/partials/archive-secondary', 'meta' ); ?>
</div>