<?php
/*
 *--------------------------------------------
 *
 * Let's make wordpress easier :P
 *
 *--------------------------------------------
 * Convert plain text into link
 */
function fix_link($raw_link)
{
   $reg_ex = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^‌​,.\s])@';
   $link = preg_replace($reg_ex, 'http$2://$4', $raw_link);
   //
   return $link;
}

function pretty_link($raw_link)
{
   $reg_ex = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^‌​,.\s])@';
   $link = preg_replace($reg_ex, '$4', $raw_link);
   //
   return rtrim($link, '/');
}

/**
 *--------------------------------------------
 * Body class by categories
 */
function categories_to_bodyclasses($classes)
{
   //if (!$is_single()) return $classes;
   $post_categories = get_the_category();
   foreach ($post_categories as $current_category) {
      $classes[] = 'category-' . $current_category->slug;
   }

   return $classes;
}

add_filter('body_class', 'categories_to_bodyclasses');
/**
 *--------------------------------------------
 * Display featured image
 */
function feat_img($type_img = 'full', $blur = true, array $classes = array())
{
   global $post;
   $classes = count($classes) === 0 ? 'feat-img' : implode(" ", $classes) . ' feat-img';

   echo '<div class="'. $classes .'">';
   if (has_post_thumbnail($post->ID)) {
      if ($blur) {
         echo '<div class="bg-placeholder-img" style="background-image: url(' . get_the_post_thumbnail_url($post->ID, 'thumbnail') . ')"></div>';
      }

      the_post_thumbnail($type_img, ['class' => 'feat-img-file']);
   }
   echo '</div><!-- .feat-img -->';
}

//
function category_feat_img($type_img = 'full', $blur = true)
{
   $category_image = (function_exists('category_image_src')) ? category_image_src(['size' => $type_img], false) : '';
   echo '<div class="feat-img">';
   if ($blur) {
      echo '<div class="bg-placeholder-img" style="background-image: url(' . category_image_src(['size' => 'thumbnail'], false) . ')"></div>';
   }

   echo '<img class="feat-img-file" src="' . $category_image . '" alt="">';
   echo '</div><!-- .feat-img -->';
}

/**
 *--------------------------------------------
 * Wrap <img> in div
 */
function img_unwrap($im)
{
   $img_template = '<div class="post-img">$1</div>';
   $im = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', $img_template, $im);
   return $im;
}

//add_filter( 'the_content', 'img_unwrap', 30 );
//
function post_img_unwrap($post, $query)
{
   $post->post_content = apply_filters('the_content', $post->post_content);
   $post->post_content = preg_replace('/(<img.*?>)/s', '<div class="post-img centered">$1</div>', $post->post_content);
   $post->post_content = preg_replace('/(<figure.*?>)/s', '<figure class="wp-caption">', $post->post_content);
   return $post;
}

add_filter('the_post', 'post_img_unwrap', 10, 2);
//
function acf_img_unwrap($value, $post_id, $field)
{
   $img_template = '</p><div class="post-img">$1</div><p>';
   //  '/(<img([^>]*)>)/i'
   $value = preg_replace('/(<img.*?>)/s', $img_template, $value);
   return $value;
}

add_filter('acf/load_value/type=wysiwyg', 'acf_img_unwrap', 10, 3);
/**
 *--------------------------------------------
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p($content)
{
   $content = force_balance_tags($content);
   $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
   $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
   return $content;
}

add_filter('the_content', 'remove_empty_p', 20, 1);
/**
 *--------------------------------------------
 * Custom excerpts
 */
function wpdocs_custom_excerpt_length($length)
{
   return 27;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
//
function wpdocs_excerpt_more($more)
{
   $more = (get_locale() == 'es_ES') ? 'Leer más' : 'Read more';
   return '&hellip; <span class="read-more">' . $more . '<b> ></b></span>';
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');
//
function excerpt($txt, $limit)
{
   //global $post;
   $txt = limit_text($txt, $limit);
   return '<p>' . strip_tags($txt) . '&hellip;</p>';
}

/**
 *--------------------------------------------
 * Get first paragraph from a given text.
 *
 * @return String
 */
function get_the_first_paragraph($txt = '', $limit = '', $hellip = false)
{
   global $post;
   //
   $txt = ('' == $txt) ? get_the_content() : $txt;
   $str = wpautop($txt);
   $str = ('' != $limit && $limit > 0) ? limit_text($str, $limit) : substr($str, 0, strpos($str, '</p>') + 4);
   $str = strip_tags($str);
   //
   $p = ($hellip) ? '<p>' . rtrim($str, '/[.,]/ \t\n') . '&hellip;</p>' : '<p>' . $str . '</p>';
   return $p;
}

//
function the_first_paragraph($txt = '', $limit = 0, $hellip = false)
{
   echo get_the_first_paragraph('', $limit, $hellip);
}

/**
 *--------------------------------------------
 * limit text by words
 */
function limit_text($text, $limit)
{
   if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]);
   }
   return $text;
}

/**
 *--------------------------------------------
 * Simple category title
 */
function get_category_title($title)
{
   if (is_category()) {
      $title = single_cat_title('', false);
   } elseif (is_subcategory()) {
      $title = single_cat_title('', false);
   } elseif (is_tag()) {
      $title = single_tag_title('', false);
   } elseif (is_author()) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
   }

   //
   return $title;
}

//
function is_subcategory($cat_id = null)
{
   if (!$cat_id) {
      $cat_id = get_query_var('cat');
   }

   return (bool) (get_category($cat_id)->category_parent > 0);
}

//
add_filter('get_the_archive_title', 'get_category_title');
/**
 *--------------------------------------------
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 *
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join($join)
{
   global $wpdb;
   if (is_search()) {
      $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
   }

   return $join;
}

add_filter('posts_join', 'cf_search_join');
/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 *
 */
function cf_search_where($where)
{
   global $pagenow, $wpdb;
   if (is_search()) {
      $where = preg_replace(
         "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
         "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)",
         $where
      );
   }
   return $where;
}

add_filter('posts_where', 'cf_search_where');
/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct($where)
{
   global $wpdb;
   if (is_search()) {
      return "DISTINCT";
   }

   return $where;
}

add_filter('posts_distinct', 'cf_search_distinct');
