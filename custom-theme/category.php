<?php get_header(); ?>

<section class="container my-5">
    <!-- Category Title -->
    <div class="row mb-5">
        <div class="col-12">
            <h1><?php single_cat_title(); ?></h1>
        </div>
    </div>

    <!-- Placeholder for Featured Posts and Child Categories Sections -->
    <section class="container my-5">
    <!-- Featured Posts -->
        <div class="row mb-5">
            <?php
            // Get the current category ID
            $current_category_id = get_queried_object_id();

            // Query for featured posts within the current category
            $featured_posts = new WP_Query(array(
                'tag' => 'featured-top',
                'category__in' => array($current_category_id),
                'posts_per_page' => 5,
            ));

            if ($featured_posts->have_posts()) : while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                <div class="col-md-2 mb-4">
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
                </div>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p>No featured posts found.</p>
            <?php endif; ?>
        </div>

        <!-- Child Categories -->
        <div class="container my-5">
            <?php
            // Get child categories of the current category
            $child_categories = get_categories(array(
                'parent' => $current_category_id,
                'hide_empty' => false,
            ));

            foreach ($child_categories as $child_category) :
                // Query for the 5 most recent posts in each child category
                $child_category_posts = new WP_Query(array(
                    'category__in' => array($child_category->term_id),
                    'posts_per_page' => 5,
                ));
                ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <h2><?php echo $child_category->name; ?> <a href="<?php echo get_category_link($child_category->term_id); ?>" class="btn btn-secondary btn-sm">See More</a></h2>
                    </div>
                    <?php
                    if ($child_category_posts->have_posts()) : while ($child_category_posts->have_posts()) : $child_category_posts->the_post();
                        // Output post markup similar to the featured posts section
                        ?>
                        <div class="col-md-2 mb-4">
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
                        </div>
                    <?php endwhile; wp_reset_postdata(); else: ?>
                        <p>No posts found in this category.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </section>

    <!-- These sections will be defined in the next steps -->

</section>

<?php get_footer(); ?>
