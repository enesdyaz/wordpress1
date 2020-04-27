<?php get_header() /* Template Name: fertiliser */  ?>

<div class="sub" style='color: blue; font-size: 40px;'>

</div>

<img src="<?php echo get_field('page', 207)['url']; ?>" alt="">

<?php

$currentEvents = new Wp_Query(array(
    'post_type'     =>'item'
));
if($currentEvents->have_posts()){

    while($currentEvents->have_posts()){
        $currentEvents->the_post();
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $postFeatureImg = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
        $postFeatureAlt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>
<div><a style='color: black' href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
<div ><?php the_content() ?></div>
<div class="paginate"><?php echo paginate_links(); ?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'price', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'subtitle', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'pub_date', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'item_code', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'key_info', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'care_advice', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'select', true)?> </div>
<div style='color: red' class="subtitle"> <?= get_post_meta(get_the_ID(), 'available', true)?> </div>



<?php 

$array = get_post_meta(get_the_ID(), 'image-url', true);
$images = explode(',',$array,5);

foreach ($images as $i){
    echo '<img src=' .$i . ' /><br>';
};
 ?>

<div class="image-show">
<img  
    src="<?php echo esc_url(has_post_thumbnail() ? $postFeatureImg[0] : get_theme_file_uri('/assets/img/blog1.jpg')); ?>" 
    alt="<?php echo (has_post_thumbnail() ? $postFeatureAlt : 'Dummuy Image'); ?>">
</div>




<?php }} wp_reset_query() ?>