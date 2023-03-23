<?php get_header();  ?>
<!-- страница списка записей блога -->


<!-- ИНДЕКС -->
<div class="search__wrap">
  <div class="search__close-inner">
    <div class="search__close"></div>
  </div>
  <div class="search__inner">

    <i class="fas fa-search"></i>
    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
  </div>
</div>
<section class="section" style="height: 15px;">
  <div class="wrap">

    <div class="section__container">
      <?

      $cats = get_pages([
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'meta_key'     => 'services_type',
        'meta_value'   => 'category',
        'authors'      => '',
        'child_of'     => 0,
        'parent'       => -1,
        'exclude_tree' => '',
        'number'       => '',
        'offset'       => 0,
        'post_type'    => 'services',
        'post_status'  => 'publish,draft',
      ]);

      // echo "<pre>";
      // print_r($cats);
      // echo "</pre>";
      if ($cats) {
        echo '<div style="width: 650px; margin-bottom: 50px">';
        foreach ($cats as $cat) {
          // setup_postdata($post);
          if ($cat->post_parent == 0) {
            echo '<div style="display: flex; margin-top: 20px; margin-bottom: 5px;"><div style="display: inline-block; width: 400px; border: 1px solid gray; padding: 5px;">' . $cat->post_title . '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">' . get_field('services_active', $cat->ID) .  '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">' . get_field('services_id_cat', $cat->ID) . '</div>';
            echo '<div style="display: inline-block; width: 200px; border: 1px solid gray; padding: 5px;">';
            echo the_field('services_cat', $cat->ID) . '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">';
            echo the_field('services_docs_id', $cat->ID) . '</div>';
            echo '</div>';
          } else {
            echo '<div style="display: flex; margin-bottom: 5px; margin-left: 50px;"><div style="display: inline-block; width: 350px; border: 1px solid gray; padding: 5px;">' . $cat->post_title . '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">' . get_field('services_active', $cat->ID) .  '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">' . get_field('services_id_cat', $cat->ID) . '</div>';
            echo '<div style="display: inline-block; width: 200px; border: 1px solid gray; padding: 5px;">';
            echo the_field('services_cat', $cat->ID) . '</div>';
            echo '<div style="display: inline-block; width: 50px; border: 1px solid gray; padding: 5px;">';
            echo the_field('services_docs_id', $cat->ID) . '</div>';
            echo '</div>';
          }
        }
        echo '</div>';
      } else {
        echo 'Массив пустой<br><br>';
      }
      wp_reset_postdata();

      ?>
    </div>
  </div>

</section>





<?php
// get_footer(); 
?>