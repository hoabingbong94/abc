<div class="product-main">
 <div class="row content-row row-divided row-large row-reverse">
	<div class="col large-9">
		<div class="row">
			<div class="large-<?php echo flatsome_option('product_image_width'); ?> col">
				<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>

			</div>


			<div class="product-info summary entry-summary col col-fit <?php flatsome_product_summary_classes();?>">
				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>

			</div><!-- .summary -->


			</div><!-- .row -->
			<div class="product-footer">
			<?php
					/**
					 * woocommerce_after_single_product_summary hook
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
	
    </div><!-- col large-9 -->

    <div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar <?php flatsome_sidebar_classes(); ?>">
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
			do_action('flatsome_before_product_sidebar');
			/**
			 * woocommerce_sidebar hook
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			if (is_active_sidebar( 'product-sidebar' ) ) {
				dynamic_sidebar('product-sidebar');
			} else if(is_active_sidebar( 'shop-sidebar' )) {
				dynamic_sidebar('shop-sidebar');
			}
		?>
	</div><!-- col large-3 -->

</div><!-- .row -->
</div><!-- .product-main -->
