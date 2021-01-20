<?php
/*
Template Name: Новостройки шаблон
Template Post Type: novostrojki
*/
?>
<?php get_header(); ?>

<?php
$post_id = get_the_ID();

while (have_rows('gp', $post_id)) : the_row();
  $year = get_sub_field('srok_sdachi');
  while (have_rows('kvartiry')) : the_row();
    $price = get_sub_field('czena');
    $area = get_sub_field('ploshhad');
    if (isset($price) && !empty($price)) {
      $prices[] = $price;
    }

    if (isset($area) && !empty($area)) {
      $areas[] = round($area, 0);
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
$lat = get_field('lat');
$lng = get_field('lng');
$iconMap = get_field('icon-map');

?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="project">
        <div class="project__info">
          <?php
          $args = [
            'heading' => $title,
            'subheading' => 'от ' . $minprice . ' р.',
            'metaOne' => $adress,
            'metaTwo' => 'Ипотека от 30 000 р./мес',
          ];
          get_template_part('/parts/project', 'title', $args)
          ?>
        </div>
        <div class="project__slider">
          <?php
          $args = [
            'row' => 'pictures',
            'subField' => 'image',
            'size' => 'page-bigimg',
          ];
          get_template_part('/parts/slider', 'big', $args)
          ?>
        </div>

        <div class="project__property">
          <?php
          $args = [
            'title' => 'Класс проекта',
            'info' => 'Бизнес',
          ];
          get_template_part('/parts/project', 'meta-item', $args)
          ?>
          <?php
          $args = [
            'title' => 'Площадь',
            'info' => 'от ' . $minarea . ' до ' . $maxarea . ' м²',
          ];
          get_template_part('/parts/project', 'meta-item', $args)
          ?>
          <?php
          $args = [
            'title' => 'Сдача',
            'info' => $year,
          ];
          get_template_part('/parts/project', 'meta-item', $args)
          ?>
          <?php
          $args = [
            'title' => 'Исполнение дома',
            'info' => 'Кирпич',
          ];
          get_template_part('/parts/project', 'meta-item', $args)
          ?>
        </div>

        <div class="project__description">
          <?php
          $args = [
            'title' => 'Описание проекта',
            'info' => $description,
          ];
          get_template_part('/parts/project', 'description', $args)
          ?>
        </div>

        <div class="project__features">
          <?php
          $args = [
            'sectionTitle' => 'Основные преимущества',
          ];
          get_template_part('/parts/project', 'features', $args)
          ?>
        </div>

        <div class="project__map">
          <?php
            $args = [
              'iconMap' => $iconMap,
              'lat' => $lat,
              'lng' => $lng,
            ];
            get_template_part('/parts/project', 'map', $args)
          ?>          
        </div>
        <div class="project__flats">
        <?php
            $args = [
              'sectionTitle' => 'Квартиры',
            ];
            get_template_part('/parts/project', 'flats', $args)
          ?>                
        </div>
        <div class="project__characteristic">
          <?php
            $args = [
              'sectionTitle' => 'Техинческие характеристики',
              'row' => 'attribute'
            ];
            get_template_part('/parts/project', 'attribute', $args)
          ?> 
        </div>
        
        <div class="project__advantage-whith-us">
        <?php
            $args = [
              'sectionTitle' => 'Преимущества работы с нами',
              'row' => 'advantage-whith-us'
            ];
            get_template_part('/parts/advantage-whith-us', '', $args)
          ?> 
        </div>
      </div>

    </div>
  </div>
</div>

<?php get_footer(); ?>