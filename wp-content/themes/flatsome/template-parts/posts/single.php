<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
		<?php
			if(flatsome_option('blog_post_style') == 'default' || flatsome_option('blog_post_style') == 'inline'){
				get_template_part('template-parts/posts/partials/entry-header', flatsome_option('blog_posts_header_style') );
			}
		?>
		<?php get_template_part( 'template-parts/posts/content', 'single' ); ?>
	</div><!-- .article-inner -->
</article><!-- #-<?php the_ID(); ?> -->

<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>
<?php
$vnkings = new WP_Query(array(
    'post_status'=>'publish',
    'category_name' => 'tin-tuc',
    'orderby' => 'ID',
    'order' => 'DESC',
    'posts_per_page'=> '4'));
?>
<div class="related related-products-wrapper product-section" style="border: none;">
    <h3 class="product-section-title product-section-title-related pt-half pb-half uppercase">Bài viết liên quan</h3>
    <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
    <?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
    <?php if ($vnkings->post_count > 0) { ?>
        <div class="product-small col has-hover post-1153 product type-product status-publish has-post-thumbnail product_cat-kho-ga-xe-cay  instock shipping-taxable product-type-simple">
            <div class="col-inner">
                <div class="badge-container absolute left top z-1">
                </div>
                <div class="product-small box ">
                    <div class="box-image">
                        <div class="image-zoom">
                            <a class="image_sp" href="<?php the_permalink() ;?>">
                                <?php the_post_thumbnail("medium",array('width' => "247", 'height' => "150", "title" => get_the_title(),"alt" => get_the_title() ));?>
                            </a>
                        </div>
                        <div class="image-tools is-small top right show-on-hover">
                        </div>
                        <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                        </div>
                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                        </div>
                    </div><!-- box-image -->

                    <div class="box-text box-text-products">
                        <div class="title-wrapper"><p class="name product-title"><a href="<?php the_permalink() ;?>"><?= the_title(); ?></a></p></div><div class="price-wrapper">
                            
                        </div>		</div><!-- box-text -->
                </div><!-- box -->
            </div><!-- .col-inner -->
        </div><!-- col -->
        <?php } else {?>
            <h3>Không có sản phẩm liên quan</h3>
        <?php } ?>
        <?php endwhile ; wp_reset_query() ;?>
    </div>
</div>
<style>
    .box-image .image-zoom .image_sp img {
        width: 247px;
        height: 150px;
    }
</style>