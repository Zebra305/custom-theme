<?php get_header(); ?>

<section class="container my-5">
    <!-- Category Title -->
    <div class="row mb-5">
        <div class="col-12">
            <h1><?php single_cat_title(); ?></h1>
        </div>
    </div>

    <!-- Placeholder for Featured Posts and Load More Functionality -->
        <!-- Posts Section -->
    <div class="row mb-5" id="recent-posts-grid">
        <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>
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
        <?php endwhile; else: ?>
            <p>No posts found in this category.</p>
        <?php endif; ?>

        

    </div>
    
    <!-- ... your existing code ... -->

    <!-- Load More Button -->
    <div class="row text-center">
        <div class="col-12">
            <button type="button" class="btn btn-primary btn-load-more-child-category" data-page="1" data-category="<?php echo get_queried_object_id(); ?>">Load More</button>
        </div>
    </div>

    <!-- ... your existing code ... -->

    <!-- These sections will be defined in the next steps -->
    
</section>

<?php get_footer(); ?>
