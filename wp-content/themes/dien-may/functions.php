<?php
add_filter('woocommerce_empty_price_html', 'custom_call_for_price');
 
function custom_call_for_price() {
return 'Liên h&#7879;';
}
// add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');

// function no_category_base_rewrite_rules($category_rewrite) {
//     $category_rewrite = array();
//     $categories = get_categories(array('hide_empty' => false));
//     foreach ($categories as $category) {
//         $category_nicename = $category->slug;
//         if ($category->parent == $category->cat_ID)
//             $category->parent = 0;
//         elseif ($category->parent != 0)
//             $category_nicename = get_category_parents($category->parent, false, '/', true) . $category_nicename;
//         $category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
//         $category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
//         $category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
//     }
//     global $wp_rewrite;
//     $old_base = $wp_rewrite->get_category_permastruct();
//     $old_base = str_replace('%category%', '(.+)', $old_base);
//     $old_base = trim($old_base, '/');
//     $category_rewrite[$old_base . '$'] = 'index.php?category_redirect=$matches[1]';
//     return $category_rewrite;
// }
?>