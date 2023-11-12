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
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary float-end mt-auto">Read More</a>
                        <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <?php
                // Query for right featured posts
                $featured_right = new WP_Query(array(
                    'tag' => 'featured-right',
                    'posts_per_page' => 5,
                ));

                if ($featured_right->have_posts()) : while ($featured_right->have_posts()) : $featured_right->the_post(); ?>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary float-end mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </div>

    <!-- Category Navigation -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <?php
            $categories = get_categories(array(
                'parent' => 0,  // Ensures that only top-level categories are fetched
                'exclude' => 1,   // Excludes the 'Uncategorized' category
            ));
            foreach ($categories as $category) {
                echo '<a href="' . get_category_link($category->term_id) . '" class="btn btn-primary me-2 mb-2">' . $category->name . '</a>';
            }
            ?>
        </div>
    </div>



    <!-- Recent Posts -->
    <div class="row mb-5 recent-posts-container" id="recent-posts-grid">
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
                        <p class="card-text">
                            <?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
                        </p>
                        <p class="text-muted"><small>By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary float-end mt-auto">Read More</a>
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

