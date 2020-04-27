<?php

//--------------------------------------------------------------->
// Style.css applied -------------------------------------------->
//---------------------------------------------------------------> 
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('my_enqueue_style', get_stylesheet_uri());
});

add_action('after_setup_theme', function(){
    add_theme_support('title-tag');
    add_image_size('jumbotron_size', 1800, 900, array('center', 'center'));   // 이름, 가로, 세로, 가로세로 중심을 기준으로
    
    
});





//--------------------------------------------------------------->
// custom-post-type  -------------------------------------------->
//--------------------------------------------------------------->
add_action('init', 'item_custom_post_type');

function item_custom_post_type(){

    $labels = array(
        'name'                  => _x( 'Item', 'Post type general name', 'booktopia' ),
        'singular_name'         => _x( 'Item', 'Post type singular name', 'booktopia' ),
        'menu_name'             => _x( 'items', 'Admin Menu text', 'booktopia' ),
        'name_admin_bar'        => _x( 'items', 'Add New on Toolbar', 'booktopia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'item' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type('item', $args);
}


add_theme_support('post-thumbnails');
add_post_type_support( 'item', 'thumbnail' );

//--------------------------------------------------------------->
// meta-boxes  -------------------------------------------------->
//--------------------------------------------------------------->
add_action('add_meta_boxes_item', function() {
    add_meta_box('item-box', 'item details', function(){
    include 'item-box/item-box.php';
}, 'item');

});


// updating metabox contents
add_action('save_post_item', function($post_id){
    if(!empty($_POST['meta'])){
        foreach($_POST['meta'] as $key => $value){
            update_post_meta($post_id, $key, $value);
        }
    }
});


//--------------------------------------------------------------->
// images in item post type ------------------------------------->
//--------------------------------------------------------------->


add_action('add_meta_boxes_item', function(){
    add_meta_box('image-box', 'add image', function(){
        include 'item-box/image-box.php';
    });
});



// javascript for custom-post-item
add_action('admin_enqueue_scripts', function(){
    $screen = get_current_screen();
    if($screen->id == 'item'){
    wp_enqueue_script('item-media', get_template_directory_uri() . '/assets/js/item-media.js', ['media-views'], '2020', true);
    }

});


//--------------------------------------------------------------->
// image size setting ------------------------------------------->
//--------------------------------------------------------------->




?>