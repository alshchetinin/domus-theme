<div class="swiper-container big-slider">
  <div class="swiper-wrapper">
        <?php         while( have_rows($args['row'], $post_id) ): the_row(); 
        $image = get_sub_field($args['subField']);
        $allimage =  wp_get_attachment_image( $image, $args['size'] ,'', ["class" => "swiper-slide"]); 
        echo $allimage;              
      endwhile;?>
  </div>
</div>