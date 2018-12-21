<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */
require_once('BFI_Thumb.php');
require get_template_directory() . '/inc/init.php';
/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    $tabs['description']['title'] = __( 'MÔ TẢ CHI TIẾT' );
    unset( $tabs['ux_global_tab'] );  	// Remove the additional information tab

    return $tabs;

}
function catch_that_image($paramswidth, $paramsheight, $thetitle) {
    global $post;
    $params = array('width' => $paramswidth, 'height' => $paramsheight);
    $get_the_title = $thetitle;
    $home = get_bloginfo('url');
    $imgsrc = $home . '/wp-content/uploads/2016/11/no_photo.jpg';
    echo "<img  src='" . bfi_thumb($imgsrc, $params) . "' class='img-responsive' alt='$get_the_title'/>";
}

//Khởi tạo function cho shortcode
function create_shortcode() {
	$args = [
		'post_type' => 'product',
        'post_status' => 'publish',	
	  	'meta_key' => 'selected_count_show_sp',
	    'posts_per_page' => 4,
	    'meta_value' => '1',
	    'meta_value_num' => 10, 
	    'order' => 'DESC',
	];
	ob_start();
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
                        <?php the_post_thumbnail("medium",array("width" => "247", "height" => "300", "title" => get_the_title(),"alt" => get_the_title() ));?>
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
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode( 'show_sp_shortcode', 'create_shortcode' );