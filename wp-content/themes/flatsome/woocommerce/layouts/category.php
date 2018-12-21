<div class="row category-page-row">

		<div class="col large-3 hide-for-medium <?php flatsome_sidebar_classes(); ?>">
			<div id="shop-sidebar" class="sidebar-inner col-inner">
                <aside id="flatsome_recent_posts-3" class="widget flatsome_recent_posts"><h3 class="widget-title "><span>Bài viết mới</span>
                    </h3>
                    <div class="is-divider small"></div>
                    <ul>
                        <?php
                        query_posts(array('category_name' => 'tin-tuc', 'posts_per_page' => 5));
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
				<?php
				  if(is_active_sidebar('shop-sidebar')) {
				  		dynamic_sidebar('shop-sidebar');
				  	} else{ echo '<p>You need to assign Widgets to <strong>"Shop Sidebar"</strong> in <a href="'.get_site_url().'/wp-admin/widgets.php">Appearance > Widgets</a> to show anything here</p>';
				  }
				?>

			</div><!-- .sidebar-inner -->
		</div><!-- #shop-sidebar -->
		
		<div class="col large-9">
		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
		<h1><?php woocommerce_page_title(); ?></h1>
		<?php if ( have_posts() ) : ?>

			<?php
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
		<?php do_action( 'woocommerce_archive_description' ); ?>
		<?php
		 	do_action('flatsome_products_after');
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		</div>
</div>
