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
<section class="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="" class="form-page-search">
          <div class="form-page-search__main">
            <div class="form-page-search__district">
              <select name="district" id="district">
                <option value="">Ленинский</option>
                <option value="">Ленинский</option>
                <option value="">Ленинский</option>
                <option value="">Ленинский</option>
              </select>
            </div>


            <div class="form-page-search__price">
              <input type="number" name="minprice" id="minprice" placeholder="от 960 000 р.">
              <input type="number" name="maxprice" id="maxprice" placeholder="от 960 000 р.">
            </div>
            <div class="form-page-search__room">
              <label for="rooms_1" class="checkbox-rooms">
              <input type="checkbox" name="rooms" value="1" id="rooms_1">
                <span>1</span>
                
              </label>

              <label for="rooms_2" class="checkbox-rooms">
              <input type="checkbox" name="rooms" value="1" id="rooms_2">
                <span>2</span>
                
              </label>
              <label for="rooms_3" class="checkbox-rooms">
              <input type="checkbox" name="rooms" value="1" id="rooms_3">
                <span>3</span>
                
              </label>
              <label for="rooms_4" class="checkbox-rooms">
              <input type="checkbox" name="rooms" value="1" id="rooms_4">
                <span>4</span>
                
              </label>
              <label for="rooms_0" class="checkbox-rooms">
              <input type="checkbox" name="rooms" value="1" id="rooms_0">
                <span>Студия</span>
                
              </label>
            </div>
            <div class="form-page-search__year">
              <select name="year" id="year">
                <option value="1">1 квартар 2020</option>
                <option value="2">2 квартал 2020</option>
              </select>
            </div>

            <div class="form-page-search__submit">
              <button class="primary-button">
                Показать
              </button>
            </div>


          </div>

        </form>
      </div>
    </div>
  </div>

</section>
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

            while (have_rows('foto_zhk', $post_id)) : the_row();
              $image = get_sub_field('kartinka');
              $allimage =  wp_get_attachment_image($image, 'zhk-thumbnail');
              break;
            endwhile;
            while (have_rows('gp', $post_id)) : the_row();
              $year = get_sub_field('srok_sdachi');
              while (have_rows('kvartiry')) : the_row();
                $price = get_sub_field('czena');
                if (isset($price) && !empty($price)) {
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
            get_template_part('./parts/zhk', 'item', $args) ?>
          </div>
        <?php endwhile; ?>
      <?php endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php
