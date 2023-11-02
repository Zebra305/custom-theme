<?php
get_header();
while ( have_posts() ) :
    the_post();
    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">  <!-- Wrapper div to center content -->
                <header class="entry-header mb-4 text-center">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <span class="entry-author"><?php the_author(); ?></span> |
                        <span class="entry-date"><?php the_time('F j, Y'); ?></span>
                    </div>
                </header>

                <!-- Categories and Tags -->
                <div class="entry-taxonomies mb-4 text-center">
                    <div class="entry-categories">
                        <span class="meta-label">Categories:</span> <?php the_category(', '); ?>
                    </div>
                    <div class="entry-tags">
                        <span class="meta-label">Tags:</span>
                        <?php
                        $tags = get_the_tags();
                        if ( $tags ) :
                            foreach ( $tags as $tag ) :
                                // Exclude the featured-left and featured-right tags
                                if ( $tag->name !== 'featured-left' && $tag->name !== 'featured-right' ) :
                                    echo '<span class="tag"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></span> ';
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Your featured image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-image mb-4 text-center">
                        <a href="<?php the_post_thumbnail_url('full'); ?>" data-lightbox="post-image">
                            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
endwhile;
get_footer();
?>
