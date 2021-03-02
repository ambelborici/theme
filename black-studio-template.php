<?php /* Template Name: Black Studio Template */
get_header();

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'order' => 'DESC',
    'orderby' => 'ID',
);
$posts = new WP_Query($args);
$increment = 0;
?>
<?php
// The Loop
if ( $posts->have_posts() ) :?>
    <main class="masonery">
        <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="item-<?php echo $increment ?>">
                <img src="<?php echo get_the_post_thumbnail_url() == NULL ? 'https://picsum.photos/600/300/?random' : the_post_thumbnail_url() ?>">
                <div class="cta">
                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                </div>
            </div>
            <?php $increment++; endwhile; ?>
    </main>
<?php endif;
/* Restore original Post Data */
wp_reset_postdata();

get_footer();
?>
