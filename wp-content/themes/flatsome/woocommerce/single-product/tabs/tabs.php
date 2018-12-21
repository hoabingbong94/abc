<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Get sections instead of tabs if set
if(get_theme_mod('product_display') == 'sections'){
	wc_get_template_part( 'single-product/tabs/sections' );
	return;
}

// Get accordian instead of tabs if set
if(get_theme_mod('product_display') == 'accordian'){
	wc_get_template_part( 'single-product/tabs/accordian' );
	return;
}


/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>
    <?php foreach ( $tabs as $key => $tab ) : ?>
        <div class="woocommerce-tabs tabbed-content">
            <ul class="product-tabs nav small-nav-collapse tabs">
                    <li class="">
                        <h3 class="widget-h3">
                           <?= apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
                       </h3>
                    </li>
                        <hr>
            </ul>
            <div class="tab-panels">
                <div class="entry-content ">
                    <?php call_user_func( $tab['callback'], $key, $tab ) ?>
                </div>

            </div><!-- .tab-panels -->
        </div><!-- .tabbed-content -->
    <?php endforeach; ?>

<?php endif; ?>
    <h3>Sản phẩm liên quan</h3>
<?php
    $args = [
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'DESC',
    ];
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
    ?>
    <div class="related related-products-wrapper">
        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
            <?php
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                ?>
                <div class="product-small col has-hover post-1151 product type-product status-publish has-post-thumbnail product_cat-kho-ga-xe-cay  instock shipping-taxable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom">
                                    <a class="image_sp" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail("medium_large", array("width" => "247", "height" => "300", "title" => get_the_title(),"alt" => get_the_title() ));?>
                                    </a>
                                </div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                            </div>
                            <!-- box-image -->
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a href="<?php the_permalink() ;?>"><?php the_title() ?></a></p>
                                </div>
                                <div class="price-wrapper">
                                    <span class="price">Liên hệ</span>
                                </div>
                            </div>
                            <!-- box-text -->
                        </div>
                        <!-- box -->
                    </div>
                    <!-- .col-inner -->
                </div>
            <?php }?>
        </div>
    </div>
<?php
/* Restore original Post Data */
wp_reset_postdata();
} else {
    // no posts found
}
?>