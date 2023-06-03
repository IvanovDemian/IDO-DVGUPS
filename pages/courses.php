<?php get_header(); ?>

<?php
wp_redirect( home_url() . '/programs/catalog', 301);
exit;
?>

<?php get_footer(); ?>