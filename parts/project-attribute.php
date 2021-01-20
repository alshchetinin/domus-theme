<div class="project-attribute">
  <h2><?php echo $args['sectionTitle']; ?></h2>
  <div class="project-attribute__wrapper">
    <?php while (have_rows($args['row'])) : the_row();
      $key = get_sub_field('key');
      $value = get_sub_field('value');
    ?>
    <div class="project-attribute-item">
      <div class="project-attribute-item__key"><?php echo $key ?></div>
      <div class="project-attribute-item__value"><?php echo $value ?></div>      
    </div>
    <?php endwhile; ?>

  </div>

</div>