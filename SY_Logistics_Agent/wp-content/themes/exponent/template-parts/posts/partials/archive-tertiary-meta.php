<?php
    $blog_tertiary_meta = exponent_get_post_loop_prop( 'tertiary_meta' );
    $allowed_metas = array( 'categories', 'date', 'author' );

    $author_meta_image = exponent_get_post_loop_prop( 'meta_author_image' );
    $date_icon = exponent_get_post_loop_prop( 'meta_date_icon' );
    $labeled_cat = exponent_get_post_loop_prop( 'labeled_cat' );
    $loop_style = exponent_get_post_loop_prop( 'style' );
    $loop_styles_with_animated_cat = array ( 'style3', 'style7' );
    $animated_cat = empty( $labeled_cat ) && in_array( $loop_style, $loop_styles_with_animated_cat );
    $animated_author = in_array( $loop_style, $loop_styles_with_animated_cat );
    set_query_var( 'be_meta_author_image', $author_meta_image );
    set_query_var( 'be_meta_date_icon', $date_icon );
    set_query_var( 'be_meta_labeled_cat', $labeled_cat );
    set_query_var( 'be_animated_cat', $animated_cat );
    set_query_var( 'be_animated_author', $animated_author );

    if( !empty( $blog_tertiary_meta ) ) : 
?>
    <div class="<?php echo be_themes_get_class( 'post-tertiary-meta' ); ?>">
        <?php 
        foreach( $blog_tertiary_meta as $meta ) {
            if( in_array( $meta, $allowed_metas ) ) {
                get_template_part( 'template-parts/posts/partials/archive-meta', $meta );
            }
        }
        ?>
    </div>
<?php
    endif; 
?>
