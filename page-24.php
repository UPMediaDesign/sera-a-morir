<?php get_header()?>


<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>
<div class="clear separator"></div>

<h1>Gracias por dar tu energía</h1>
<a href="<?php echo get_bloginfo('url')?>" class="btn btn-success btn-lg">Volver al inicio</a>

<?php if($_GET['sm']){?>
<?php setPostViews($post->ID);?>
<?php setPostViews($_GET['sm']);?>
<?php }?>

<h1>Energía total<?php echo getPostViews($post->ID)?></h1>
<h1>Energía individuo<?php echo getPostViews($_GET['sm'])?> <?php echo get_the_post_thumbnail($_GET['sm'] , 'mini')?></h1>

<?php get_footer()?>