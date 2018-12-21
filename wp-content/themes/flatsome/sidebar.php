<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package flatsome
 */
?>
<div id="secondary" class="widget-area <?php flatsome_sidebar_classes(); ?>" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
    <aside id="flatsome_recent_posts-3" class="widget flatsome_recent_posts"><h3 class="widget-title "><span>Bài viết mới</span>
        </h3>
        <div class="is-divider small"></div>
        <ul>
            <?php
            query_posts(array('category_name' => 'tin-tuc', 'posts_per_page' => 5, 'post_status' => 'publish'));
            $count = 1;
            while (have_posts()) : the_post();
                if ($count++ == 1) {
                    ?>
                    <li class="recent-blog-posts-li">
                    <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                        <div class="flex-col mr-half">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('post-thumbnail');
                                } else {
                                    if (function_exists(catch_that_image(136, 136, get_the_title()))) {
                                        catch_that_image(136, 136, get_the_title());
                                    }
                                }
                                ?>
                            </a>
                        </div>
                    </div><!-- .flex-col -->
                    <div class="flex-col flex-grow">
                        <i style="color: #f77b00;" class="fa fa-hand-o-right" aria-hidden="true"></i>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>̀" alt="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="post_comments oppercase op-7 block is-xsmall"><a href="#"></a></span>
                    </div>
                <?php } else {?>
                    <div class="flex-col flex-grow">
                        <i style="color: #f77b00;" class="fa fa-hand-o-right" aria-hidden="true"></i>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>̀" alt="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="post_comments oppercase op-7 block is-xsmall"><a href="#"></a></span>
                    </div>
                    </li>
                    <?php
                }
            endwhile;
            wp_reset_query();
            ?>
        </ul>
    </aside>
	<?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>
	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary -->
