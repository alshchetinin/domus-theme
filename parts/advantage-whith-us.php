<div class="advantage-whith-us">
  <h2><?php echo $args['sectionTitle']; ?></h2>
  <div class="advantage-whith-us__wrapper">

    <?php while (have_rows($args['row'], 'option')) : the_row();

      // переменные
      $title = get_sub_field('title');
      $text = get_sub_field('text');
    ?>
      <div class="advantage-whith-us">
        <h4 class="advantage-whith-us__title"><?php echo $title ?></h4>
        <p class="advantage-whith-us__text"><?php echo $text ?></p>
      </div>

    <?php endwhile; ?>
  </div>
</div>