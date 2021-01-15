<?php
/*
Template Name: Новостройки шаблон
Template Post Type: novostrojki
*/
?>
<?php get_header(); ?>

<?php 
        $post_id = get_the_ID();

        while( have_rows('gp', $post_id) ): the_row();
          $year = get_sub_field('srok_sdachi');
          while( have_rows('kvartiry') ): the_row(); 
            $price = get_sub_field('czena'); 
            $area = get_sub_field('ploshhad'); 
          if(isset($price) && !empty($price)){
              $prices[] = $price; 
          }

          if(isset($area) && !empty($area)){
            $areas[] = round ($area, 0); 
          }
          endwhile;     
          
        endwhile; 

        $title = get_field('title');
        $adress = str_replace('г.Тюмень, ', '', get_field('adress'));        
        $minprice = number_format(min($prices), 0, '', ' ');
        $minarea = min($areas);
        $maxarea = max($areas);
        $year = $year;
        $link = get_permalink();
        $description = get_field('opisanie_proekta');

?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="layout-obj">
        <div class="layout-obj__info">
            <h2 class="layout-obj__title"><?php echo $title ?></h2>
            <h2 class="layout-obj__price"> от <?php echo $minprice ?> р.</h2>
            <div class="layout-obj__adress"><?php echo $adress ?></div>
            <div class="layout-obj__mortage">Ипотека от 30 0000 р. / мес</div>            
        </div>
        <div class="layout-obj__slider">
        <div class="swiper-container big-slider">
          <div class="swiper-wrapper">
          
            <?php         while( have_rows('foto_zhk', $post_id) ): the_row(); 
            $image = get_sub_field('kartinka');
            $allimage =  wp_get_attachment_image( $image, 'page-bigimg' ,'', ["class" => "swiper-slide"]); 
            echo $allimage;              
          endwhile;?>
        </div>
        </div>
        </div>

        <div class="layout-obj__property">
          <div class="property-item">
            <div class="property-item__title">Класс жилья</div>
            <div class="property-item__info">Комфорт</div>            
          </div>
          <div class="property-item">
            <div class="property-item__title">Площадь</div>
            <div class="property-item__info">от <?php echo $minarea ?> до <?php echo $maxarea ?> м²</div>                   
          </div>  
          <div class="property-item">
            <div class="property-item__title">Сдача</div>
            <div class="property-item__info"><?php echo $year ?></div>            
          </div>     
          <div class="property-item">
            <div class="property-item__title">Исполнение дома</div>
            <div class="property-item__info">Комфорт</div>            
          </div>                 
        </div>

        <div class="layout-obj__description">
          <h2>Описание проекта</h2>
          <p><?php echo $description ?></p>
        </div>
        <div class="layout-obj__advantage">
          <h2>Основные преимущества</h2>
            <div class="obj-advantage">
            <?php while( have_rows('osnovnye_preimushhestva') ): the_row(); 
                // переменные
                $img = get_sub_field('kartinka');
                $title = get_sub_field('zagolovok');
                $tekst = get_sub_field('tekst');
                ?>
                  <div class="obj-advantage-item">
                    <?php wp_get_attachment_image( $img, 'zhk-thumbnail') ?>
                    <div class="obj-advantage-item__title"><?php echo $title ?></div>
                    <div class="obj-advantage-item__descr"><?php echo $tekst ?></div>                
                  </div>					                
                <?php endwhile; ?>

              
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php get_footer(); ?>