<?php
$post = $wp_query->post;

if ( in_category('instructores') ){
    include(TEMPLATEPATH.'/single-instructores.php');
}else{
    include(TEMPLATEPATH.'/single-default.php');
}
   
?>