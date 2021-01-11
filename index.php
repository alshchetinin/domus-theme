<?php get_header(); ?>

<?php get_template_part('parts/main-bg')?>
<?php get_template_part('parts/stories')?>
<?php get_template_part('parts/about')?>
<?php get_template_part('parts/main','mortage')?>
<?php get_template_part('parts/form')?>
<?php get_template_part('parts/hot-sale')?>
<?php get_template_part('parts/reviews-slider')?>
<?php get_template_part('parts/news-main')?>

<?php
$args = [ 
  'title' => 'Центр недвижимости «ДОМУС»'
];
get_template_part('parts/seo','block', $args)
?>

<?php get_footer(); ?>
