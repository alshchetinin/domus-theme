<?php
/*
Template Name: Новостройки выдача
*/
?>
<?php get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><?php the_title() ?></h1>
      </div>
    </div>
  </div>
</div>
<section class="zhk-issue">
  <div class="container">
    <div class="row">

      <?php $args = array(
        'post_type' => 'novostrojki',
        'posts_per_page' => -1,
      );
      $property = new WP_Query($args); // дальше - loop
      if ($property->have_posts()) : ?>
        <?php while ($property->have_posts()) :
          $property->the_post();
        ?>
      <div class="col-md-6 col-lg-4">
        <?php 
        $post_id = get_the_ID();

        while( have_rows('foto_zhk', $post_id) ): the_row(); 
          $image = get_sub_field('kartinka');
          $allimage =  wp_get_attachment_image( $image, 'zhk-thumbnail' ); 
          break;         
        endwhile;
        while( have_rows('gp', $post_id) ): the_row();
          $year = get_sub_field('srok_sdachi');
          while( have_rows('kvartiry') ): the_row(); 
          $price = get_sub_field('czena'); 
          if(isset($price) && !empty($price)){
              $prices[] = $price; 
          }
          endwhile;     
          
        endwhile;        
        $args = [ 
          'title' => get_field('title'),
          'adress' => str_replace('г.Тюмень, ', '', get_field('adress')),
          'image' => $allimage,
          'minprice' => number_format(min($prices), 0, '', ' '),
          'year' => $year, 
          'link' => get_permalink(),
        ];                
        get_template_part('./parts/zhk','item', $args) ?>
      </div>
        <?php endwhile; ?>
      <?php endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php 

    
    
