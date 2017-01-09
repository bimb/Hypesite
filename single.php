<?php
$post = $wp_query->post;

if ( in_category('instructores') ){
    include(TEMPLATEPATH.'/single-instructores.php');
}else if ( in_category('clases') ){
    include(TEMPLATEPATH.'/single-clases.php');
}else{
    include(TEMPLATEPATH.'/single-default.php');
}
   
?>