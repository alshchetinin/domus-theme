<h2><?php echo $args['sectionTitle']; $i = '';?></h2>
<div class="project-features">
  <?php while (have_rows('property-features')) : the_row();
    // переменные
    $img = get_sub_field('img');
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    
    $i++;
    if ($i == 4) {
      break;
    };
  ?>
    <div class="project-features-item">         
      <?php echo wp_get_attachment_image( $img, 'zhk-thumbnail', '', ["class" => "project-features-item__img"]) ?>
      <div class="project-features-item__title"><?php echo $title ?></div>
      <div class="project-features-item__text"><?php echo $text ?></div>
    </div>
    
  <?php endwhile ; ?>
</div>