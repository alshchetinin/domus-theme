<?php
/*
Template Name: Новостройки выдача
*/
?>
<?php get_header(); ?>

<?php $args = array(
  'post_type' => 'novostrojki',
  'posts_per_page' => -1,
  'meta_query'  => array(
    array(
      'key'     => 'district',
      'value'   => $_GET["district"],
      'compare_key' => 'LIKE'
    )
  )
);
$property = new WP_Query($args); // дальше - loop
if ($property->have_posts()) : ?>

  <div class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php the_title() ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="/novostrojki-v-tyumeni/" metod="GET" class="form-page-search">
          <div class="form-page-search__main">          
            <div class="form-page-search__district">
              <select name="district" id="district">
                <option value="all" <?php if ( $_GET[""] == 'kalinin') {echo 'selected';}?> >Все</option>
                <option value="kalinin" <?php if ( $_GET["district"] == 'kalinin') {echo 'selected';}?> >Калининскй</option>
                <option value="lenin" <?php if ( $_GET["district"] == 'lenin') {echo 'selected';}?> >Ленинский</option>
                <option value="1">Калининскй</option>
                <option value="1">Калининскй</option>
              </select>
            </div>


            <div class="form-page-search__price">
              <input type="number" name="minprice" id="minprice" placeholder="от 960 000 р." value="<?php echo $_GET["minprice"]?>">
              <input type="number" name="maxprice" id="maxprice" placeholder="от 960 000 р." value="<?php echo $_GET["maxprice"]?>">
            </div>
            <?php 
              if (!empty($_GET["rooms"])){};
            ?>
            <div class="form-page-search__room">
              <label for="rooms_1" class="checkbox-rooms">
                <input type="checkbox" name="rooms[]" value="1" id="rooms_1" <?php if (!empty($_GET["rooms"])){if (in_array('1', $_GET["rooms"])) {echo 'checked';}}?> >
                <span>1</span>

              </label>

              <label for="rooms_2" class="checkbox-rooms">
                <input type="checkbox" name="rooms[]" value="2" id="rooms_2">
                <span>2</span>

              </label>
              <label for="rooms_3" class="checkbox-rooms">
                <input type="checkbox" name="rooms[]" value="3" id="rooms_3">
                <span>3</span>

              </label>
              <label for="rooms_4" class="checkbox-rooms">
                <input type="checkbox" name="rooms[]" value="4" id="rooms_4">
                <span>4</span>

              </label>
              <label for="rooms_0" class="checkbox-rooms">
                <input type="checkbox" name="rooms[]" value="0" id="rooms_0">
                <span>Студия</span>

              </label>
            </div>
            <div class="form-page-search__year">
              <select name="term-date" id="year">
                <?php while ($property->have_posts()) :
                  $property->the_post();
                ?>
                  <?php
                  while (have_rows('gp', $post_id)) : the_row();
                    $year = get_sub_field('srok_sdachi');
                    if (isset($year) && !empty($year)) {
                      $years[] = $year;
                    }
                    $uni = array_unique($years);
                  ?>
                  <?php endwhile; ?>
                <?php endwhile; ?>
                <?php
                foreach ($uni as $key => $value) {

                  echo '<option value='. $value . '>' . $value . '</option>';
                };
                ?>
                <option value="1"></option>
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
  <section class="zhk-issue">
    <div class="container">
      <div class="row">
        <?php while ($property->have_posts()) :
          $property->the_post();
        ?>
          <div class="col-md-6 col-lg-4">

            <?php
            $post_id = get_the_ID();

            while (have_rows('pictures', $post_id)) : the_row();
              $image = get_sub_field('image');
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
              'link' => get_permalink(),
              'image' => $allimage,
              'tag' => get_field('tag'),
              'headingOne' => get_field('title'),
              'headingTwo' => 'от ' . number_format(min($prices), 0, '', ' ') . ' р.',
              'metaOne' => str_replace('г.Тюмень, ', '', get_field('adress')),
              'metaTwo' => $year,
              'rieltor' => false,
              'name' => 'Иванова Юлия ',
              'phone' => '+7 (999) 999 99 99',
              'avatar' => ''
            ];            
            get_template_part('./parts/project', 'item', $args) ?>
          </div>
        <?php endwhile; ?>      
      <?php
    wp_reset_postdata();
      ?>
      </div>
      <?php else : ?>
      <p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
    <?php endif; ?>
    </div>
  </section>

  <?php get_footer(); ?>



  