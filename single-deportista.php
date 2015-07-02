<?php get_header()?>

<?php $tm = getPostViews(24);?>
<?php $smm = getPostViews($post->ID);?>
<?php $meta = get_field('meta' , 'options');?>

<style>
	<?php $filled = round(($tm * 397 ) / $meta , 1)?>
	.barr  .filled.fll{ height:<?php echo $filled.'px;'?>; transition:all 1s ease-in}
	.total.up{ bottom:<?php echo $filled-25 .'px;'?>; transition: all .8s ease-in }
</style>

<div class="underbar navbar-fixed-top hidden-md hidden-lg hidden-sm">
	<div class="container">
		<div class="row">
        	<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12 col-md-offset7 col-lg-offset-7 col-sm-offset-6 ngholder">
            
            	<div class="col-xs-4 col-esp">
                	Energía <span>Team Chile</span>
                    <div class="clear"></div>
                    <span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?> de <strong><?php echo $meta;?></strong> 
                </div>
            	<div class="col-xs-8 col-esp">
                	<div class="hngbr">
                    	<div class="filler"></div>
                    </div>
                </div>
            	<style>
                	<?php $fill_h = round(($tm * 245 ) / $meta , 1)?>
					<?php $filled = round(($tm * 397 ) / $meta , 1)?>
                
					
					.hngbr .filler.fll{ width:<?php echo $fill_h.'px;'?>; transition:all 1s ease-in}
					.barr  .filled.fll{ height:<?php echo $filled.'px;'?>; transition:all 1s ease-in}
                </style>
            </div>
        </div>
	</div>
</div>



<?php $next = get_next_post_link('%link', '<span class="dg-prev">&gt;</span>', $in_same_term = true, $excluded_terms = '', $taxonomy = 'ss'); ?>

<?php $prev = get_previous_post_link('%link', '<span class="dg-next">&gt;</span>', $in_same_term = true, $excluded_terms = '', $taxonomy = 'ss'); ?>

<?php //var_dump($prev)?>

<nav>
	
    <?php echo $next;?>
    <?php echo $prev;?>
	
    <?php /* <span class="dg-prev">&lt;</span>
    <span class="dg-next">&gt;</span> */?>
</nav>

<div class="liner">
    <section id="inicio">
        <div class="container">
            <div class="row">
                
                <?php $acciones = get_field('acciones')?>
                <?php $accion_1 = wp_get_attachment_image_src( $acciones[0]['accion'] , 'acciones')?>
                <?php $accion_2 = wp_get_attachment_image_src( $acciones[1]['accion'] , 'acciones')?>
                <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                	<figure class="hints">
                    	
                        <style>
                        #acciones img{
							position:absolute;
							top:0;
						}
                        </style>
                    	<?php //if($_COOKIE['energized'] == 'si'){?>
                        	<img src="<?php echo $accion_2[0]?>" class="img-responsive actionholder" alt="">
							<div id="acciones">
								<?php foreach($acciones as $terror):?>
                                    <?php $accion = wp_get_attachment_image_src( $terror['accion'] , 'acciones')?>
                                    <img src="<?php echo $accion[0]?>" class="img-responsive" id="accion" alt="">
                                <?php endforeach;?>
                            </div>
							
						
						<script>
                        jQuery(function( $ ){ // DOM ready shorthand
							$('.actionholder').css('opacity' , 0);
							var $img = $('#acciones img'),
								n = $img.length,          // get number of images
								c = 0;                    // counter
							$img.not(':eq('+c+')').hide();
							(function loop(){
							   //$img.delay(300).fadeTo(200, 0).eq(++c%n).fadeTo( 200, 1, loop );
							   $img.delay(300).fadeTo(0, 0.1).eq(++c%n).fadeTo( 0, 1, loop );
							})();
						});
                        </script>
                        
						<?php /* }else{?>
                        
                        <img src="<?php echo $accion_1[0]?>" class="img-responsive" alt="">
                        
						<?php } */?>
                        
						<?php $hints = get_field('hints')?>
                        <?php foreach($hints as $hint):?>
							<?php $top = $hint['pos_top']?>
                            <?php $left = $hint['pos_left']?>
                            <figcaption class="hint" style="top:<?php echo $top?>%; left:<?php echo $left?>%">
                                <span class="spot"></span>
                                <small><?php echo $hint['hint']?></small>
                            </figcaption>
                        <?php endforeach?>
                        
                    </figure>
                    
                </div>
                                
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-esp sm-head">
                    	
                        <?php $ti = explode(' ',$post->post_title) ?>
                        <h1><?php echo $ti[0]; echo ' <span>'.$ti[1].'</span>';?></h1>
                        <?php $terms = wp_get_post_terms($post->ID , 'especialidad')?>
                        <?php $gico = get_field('icon' , 'especialidad_'.$terms[0]->term_id)?>
                        <?php $sico = wp_get_attachment_image_src( $gico , 'full')?>
                        <h2><?php echo $terms[0]->name;?> <img src="<?php echo $sico[0]?>" alt=""></h2>
                    </div>
                    <div class="clear separator"></div>
                    
                    <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp totalizer">
                          <div class="total">
                          	<span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?>
                          </div>
                    </div>
                    
                    <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp">
                          <div class="barr">
                              	<div class="filled"></div>
                          </div>
                    </div>
                	<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12 col-esp">
                
                        <?php echo apply_filters('the_content' , $post->post_content)?>
                        
                        <h3>Galería</h3>
                        <h1 id="meh"></h1>
                        <div class="galeria">
                            <?php $galeria = get_field('galeria')?>
                            <?php foreach($galeria as $image):?>
                                <div class="col-md-2 col-lg-2 col-xs-4 col-sm-3 col-esp">
                                    <a href="<?php echo $image['url']?>" rel="Shadowbox['Galería']"><img src="<?php echo $image['sizes']['thumbnail']?>" class="img-responsive" alt=""></a>
                                </div>
                            <?php endforeach?>
                        </div>
                        <div class="clear separator"></div>
                        <div class="darenergiabig">
                        	
                        	<a class="fb-login-button" id="fblogger" href="" onclick="FB.login(function(response){location.reload();});" onlogin="checkLoginState();" data-toggle="modal"  ><img src="<?php bloginfo('template_directory')?>/images/darenergiabig.png" alt=""></a>
                        </div>
                        
                        <div class="clear separator hidden-md hidden-lg"></div>
                        <div class="clear separator hidden-md hidden-lg"></div>
                        
                	</div>        
                </div>
                
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-step-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <h2>Envía <span>tu energía al TEAM</span></h2>
                <div class="row">
                    <?php echo do_shortcode('[contact-form-7 id="66" title="Registro de energía"]')?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-step-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                    <h2>Hazte <span>Fan</span></h2>
                    
                    <div class="fb-page hidden-xs" width="100%" data-href="https://www.facebook.com/spartachile" data-width="560px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/spartachile"><a href="https://www.facebook.com/spartachile">Sparta</a></blockquote></div></div>
                    <div class="fb-like hidden-md hidden-lg hidden-sm" data-href="https://facebook.com/spartachile" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>
                    
                </div>
                <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                	<div class="clear separator"></div>
                	<div class="clear separator hidden-xs"></div>
                	<div class="clear separator hidden-xs"></div>
                	<div class="clear separator hidden-xs"></div>
                    <h3>Sparta <span>en Facebook</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, ipsa, harum, tenetur neque sapiente impedit asperiores tempore cumque numquam autem nemo animi labore dolore illo dicta laboriosam quasi repudiandae. Nesciunt.</p>
                    <p>Molestiae, dicta, illo, deleniti maiores accusantium beatae alias sequi amet magni natus voluptas ipsam voluptatibus tempora non hic. Accusantium harum corrupti et laboriosam dolor neque amet sed pariatur labore quod.</p>
                    <div class="clear separator"></div>
                	<div class="btn btn-success btn-lg pull-right" id="sgte-2" onclick="pasoTres()">Siguiente</div>
                </div>
                
                <div class="clear separator"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-step-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<div class="modal-body">
        		<h2>Dar <span>Energy Like</span></h2>
        			<div class="col-md-7 col-lg-7 col-sm-4 hidden-xs">
                        <?php $elteam_foto =  wp_get_attachment_image_src( get_field('elteam_foto' , 'options') , 'full')?>
        				<img src="<?php echo $elteam_foto[0]?>" class="img-responsive" alt="">
        			</div>
        			
                   
                
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 col-esp">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-esp sm-head">
                        <h1><?php echo $ti[0]; echo ' <span>'.$ti[1].'</span>';?></h1>
                        <h2><?php echo $terms[0]->name;?> <img src="<?php echo $sico[0]?>" alt=""></h2>
                    </div>
                    <div class="clear separator"></div>
                    
                    <?php /* 
                    <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp totalizer">
                          <div class="total">
                          	<span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?>
                          </div>
                    </div>
                    
                     */?>
                    <div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-esp">
                          <div class="barr">
                              <div class="filled"></div>
                          </div>
                    </div>
                
                	<div class="col-md-8 col-lg-8 col-sm-2 col-xs-12 col-esp">
                        <?php echo apply_filters('the_content' , get_field('elteam' , 'options'))?>
                        
                        <div class="clear"></div>
                        <div class="darenergiabig">
                        	<a class="" id="tolast" onclick="pasoCuatro()">
                            <?php /* 
                            <a class="" id="tolast" onclick="pasoCuatro()" href="<?php echo get_page_link(24)?>?sm=<?php echo $post->ID?>">
                             */?>
                            	<img src="<?php bloginfo('template_directory')?>/images/darenergiabig-cl.png" alt="">
                            </a>
                        </div>
                        
                	</div>        
                </div>
                
                
        	<div class="clear"></div>
        	</div>
        </div>
    </div>
</div>

<div class="clear"></div>

<?php $team = get_posts(array('post_type' => 'deportista' , 'numberposts' => -1 ))?>
<?php $tg = count($team);?>
<script>
jQuery(document).ready(function($) {
	jQuery('.carro').carouFredSel({
		responsive: true,
		width: '100%',
		scroll: 2,
		auto:false,
		prev: '#ante',
		next: '#sgte',
		pagination: "#pager",
		 items: {
			width: 230,
			//height: '50%',  //  optionally resize item-height
			visible: {
				min: 2,
				max: 5
			}
		} 
	});
});
</script>

<section id="energy-bars">
	<div class="container">
    	<div class="row carrusel">
            
            <ul class="carro">
            	
                <?php $dc = 0;?>
				<?php foreach($team as $deportista):?>
                <?php $dc++?>
                
                <li class="col-md-20 sportman" style="height:200px">
                    <h4><?php echo $deportista->post_title?></h4>
                    <div class="clear"></div>
                    <?php /* ?>
                    <div class="bar bar-ver izq">
                        
                        <?php 
                        $sm = getPostViews($deportista->ID);
                        $percent = round(( $sm * 165)/ $tm , 1); 
                        
                        ?>
                        <?php //$barra = 100*$percent?>
                        <div class="barra" style="height:<?php echo $percent?>px; margin-top:<?php echo 165-$percent;?>px"></div>
                    </div>
                    <?php  */?>
                    <div class="infod">
                        
                        <a href="<?php echo get_permalink($deportista->ID)?>"><?php echo get_the_post_thumbnail($deportista->ID , 'mini' , array('class' => 'img-responsive aligncenter'))?></a>
                        <div style="text-align:center">
                            <a href="<?php echo get_permalink($deportista->ID)?>"><span id="nrg-<?php echo $deportista->post_name?>" class="btn-primary btn btn-sm gv-nrg">Dar Energía</span></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    
                    
                </li>
                <?php endforeach;?>
                
            </ul>
        	<div class="clear"></div>
            <div class="controls">
            	<div id="ante" class="control"><span class="fa fa-chevron-left"></span></div>
                <div id="sgte" class="control"><span class="fa fa-chevron-right"></span></div>
            </div>
        </div>
    </div>
</section>

<div class="clear"></div>

<?php $bgtd =  wp_get_attachment_image_src( get_field('background-foot') , 'full')?>
<section id="tildead" style=" background-image:url(<?php echo $bgtd[0]?>)">
	<div class="container">
		<div class="row">
        
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            	
                <img src="<?php bloginfo('template_directory')?>/images/moririnside.png" class="img-responsive" alt="">
            	<div class="clear"></div>
            	<?php echo apply_filters('the_content' , get_field('elteam' , 'options'))?>
            
            </div>
            
        </div>
	</div>
</section>

<?php echo get_template_part('productos')?>

<script type="text/javascript">
jQuery("#rut").Rut({
   format_on: 'keyup',
   validation:true,
   on_error: function(){ alert('El rut ingresado es incorrecto'); }
})
</script>

<!--
<a href="<?php echo get_page_link(24)?>/?sm=<?php echo $post->ID?>" class="btn btn-success btn-lg">#</a>
<h1>Energía total<?php echo getPostViews(24)?></h1>
<h1>Energía individuo<?php echo getPostViews($post->ID)?> </h1>
 -->
<?php get_footer()?>