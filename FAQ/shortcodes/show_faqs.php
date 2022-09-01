<?php

function faq_filter_shortcode( $atts, $content = null ){
//shortcode_atts
  $atts         =   shortcode_atts([
    'category_slug'    =>  '',
    'faqs_per_page'    =>  '5',
    //DESC , ASC
    'order'    =>    'DESC',
  ], $atts);
  $category_slug = $atts['category_slug'];
if($category_slug == ''){
    $the_query = new WP_Query( array(
        'post_type' => 'faq',
        'posts_per_page' => $atts['faqs_per_page'],
        'order'=> $atts['order'],
    ) );
}else{
    $the_query = new WP_Query( array(
        'post_type' => 'faq',
        'posts_per_page' => $atts['faqs_per_page'],
        'order'=> $atts['order'],
        'tax_query' =>array(
            array (
                'taxonomy' => 'faqs_catogries',
                'field' => 'slug',
                'terms' => $category_slug,
            )
            )
    ) );
}
$html= '<div class="faq">';
if($the_query->have_posts()){
    while ($the_query->have_posts() ) :
        $the_query->the_post();
        $title = get_the_title();
        $postId = get_the_ID();
        $slug = basename(get_permalink($postId));
        $content= get_the_content();
        $html .= '<button class="accordion2">'. $title.'</button>
        <div class="panel">
          <p>'.$content.'</p>
        </div>';
    endwhile;
    wp_reset_postdata();
}else{
    $html = "<p class='no_posts'>There are no faqs now </p>";
}

  return $html;
}