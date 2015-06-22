<?php get_header()?>

<?php $tm = getPostViews(24);?>
<?php $smm = getPostViews($post->ID);?>
<?php $meta = get_field('meta' , 'options');?>

<style>
	<?php $filled = round(($tm * 397 ) / $meta , 1)?>
	.barr  .filled.fll{ height:<?php echo $filled.'px;'?>; transition:all 1s ease-in}
	.total.up{ bottom:<?php echo $filled-25 .'px;'?>; transition: all .8s ease-in }
</style>

<div class="liner">
    <section id="inicio">
        <div class="container">
            <div class="row">
                
                <?php $acciones = get_field('acciones')?>
                <?php $accion_1 = wp_get_attachment_image_src( $acciones[0]['accion'] , 'acciones')?>
                <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                	<figure class="hints">
                    	<img src="<?php echo $accion_1[0]?>" class="img-responsive" alt="">
                        
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
                    
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 col-esp totalizer">
                          <div class="total">
                          	<span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?>
                          </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 col-esp">
                          <div class="barr">
                              <div class="filled"></div>
                          </div>
                    </div>
                
                	<div class="col-md-8 col-lg-8 col-sm-2 col-xs-2 col-esp">
                
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
                    
                    <div class="fb-page" width="100%" data-href="https://www.facebook.com/spartachile" data-width="560px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/spartachile"><a href="https://www.facebook.com/spartachile">Sparta</a></blockquote></div></div>
                    
                </div>
                <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                	<div class="clear separator"></div>
                	<div class="clear separator"></div>
                	<div class="clear separator"></div>
                	<div class="clear separator"></div>
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
        			<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
        				<img src="<?php echo $accion_1[0]?>" class="img-responsive" alt="">
        			</div>
        			
                   
                
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-esp sm-head">
                        <h1><?php echo $ti[0]; echo ' <span>'.$ti[1].'</span>';?></h1>
                        <h2><?php echo $terms[0]->name;?> <img src="<?php echo $sico[0]?>" alt=""></h2>
                    </div>
                    <div class="clear separator"></div>
                    
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 col-esp totalizer">
                          <div class="total">
                          	<span class="fa fa-thumbs-o-up fa-fw"></span> <?php echo $tm;?>
                          </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 col-esp">
                          <div class="barr">
                              <div class="filled"></div>
                          </div>
                    </div>
                
                	<div class="col-md-8 col-lg-8 col-sm-2 col-xs-2 col-esp">
                
                        <?php echo apply_filters('the_content' , $post->post_content)?>
                        
                        <div class="clear separator"></div>
                        <div class="darenergiabig">
                        	<a class="" id="tolast" href="<?php echo get_page_link(24)?>?sm=<?php echo $post->ID?>">
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
		scroll: 5,
		auto:false,
		prev: '#ante',
		next: '#sgte',
		pagination: "#pager",
		 items: {
			//width: 200,
			//height: '50%',  //  optionally resize item-height
			visible: {
				min: 5,
				max: <?php echo $tg?>
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
                        
                        <?php echo get_the_post_thumbnail($deportista->ID , 'mini' , array('class' => 'img-responsive aligncenter'))?>
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
            	
                <img src="<?php bloginfo('template_directory')?>/images/moririnside.png" alt="">
            	<div class="clear separator"></div>
            	<?php echo apply_filters('the_content' , get_field('footer_text'))?>
            
            </div>
            
        </div>
	</div>
</section>

<?php echo get_template_part('productos')?>

<!--
<a href="<?php echo get_page_link(24)?>/?sm=<?php echo $post->ID?>" class="btn btn-success btn-lg">#</a>
<h1>Energía total<?php echo getPostViews(24)?></h1>
<h1>Energía individuo<?php echo getPostViews($post->ID)?> </h1>
 -->
<?php get_footer()?>