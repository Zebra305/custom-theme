<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header(); ?>

<section class="container my-5">
    <!-- Featured Posts -->
    <div class="row mb-5">
        <div class="col-md-6">
            <?php
            // Query for left featured post
            $featured_left = new WP_Query(array(
                'tag' => 'featured-left',
                'posts_per_page' => 1,
            ));

            if ($featured_left->have_posts()) : while ($featured_left->have_posts()) : $featured_left->the_post(); ?>
                <div class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <?php
                // Query for right featured posts
                $featured_right = new WP_Query(array(
                    'tag' => 'featured-right',
                    'posts_per_page' => 5,
                ));

                if ($featured_right->have_posts()) : while ($featured_right->have_posts()) : $featured_right->the_post(); ?>
                    <li class="list-group-item">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                    </li>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </ul>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="row mb-5 recent-posts-container">
        <?php
        // Standard loop for most recent posts
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => 8,
            'paged' => $paged,
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()) : while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>

    <!-- Load More Button -->
    <div class="row text-center">
        <div class="col-12">
            <button type="button" class="btn btn-primary btn-load-more" data-page="1">Load More</button>
        </div>
    </div>
</section>

<?php get_footer(); ?>
