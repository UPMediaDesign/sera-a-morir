<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(is_home()){?>
	<title><?php wp_title();?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<meta name="viewport" content="width=device-width, initial-scale=0.75 , minimum-scale=1.0 ,  maximum-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>?ver=3.8.1" />
<link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Fonts -->

<!--Otros -->
<?php call_scripts()?>
<?php wp_head()?>

<!-- scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>
jQuery(window).load(function() {
	jQuery("#loader-wrapper").fadeOut("slow");
})
</script>

<!-- RRSS Shares -->
<script>
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>

<?php if(!is_single()){?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=1659876854231643";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }?>

<?php if(is_single()){?>
<script type="text/javascript">
Shadowbox.init();
</script>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1659876854231643',
      xfbml      : true,
      version    : 'v2.3'
    });

	function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
		});
	  }

	function onLogin(response) {
		if (response.status == 'connected') {
			FB.api('/me/picture?redirect=false&width=300&height=300&type=large', function(data) {
				console.log(data.data);
				var dataForm = document.getElementById('user-foto-fb');
		  		var welcomeBlock = document.getElementById('pgimage');
		  		welcomeBlock.setAttribute('src' , data.data.url);
				dataForm.setAttribute('value' , data.data.url);
			});
			
			
			function postToFeed(title, desc, url, image) {
				var obj = {method: 'feed',link: 'https://facebook.com/ipchile', picture: image,name: title,description: desc};
				function callback(response) {}
				FB.ui(obj, callback);
			}
			
			var fbShareBtn = document.querySelector('.fb_share');
			fbShareBtn.addEventListener('click', function(e) {
				e.preventDefault();
				var title = fbShareBtn.getAttribute('data-title'),
					desc = fbShareBtn.getAttribute('data-desc'),
					url = fbShareBtn.getAttribute('href'),
					image = fbShareBtn.getAttribute('data-image');
				postToFeed(title, desc, url, image);
			
				return false;
			});
			
	  	}
	}

	FB.getLoginStatus(function(response) {
	  // Check login status on load, and if the user is
	  // already logged in, go directly to the welcome message.
	  if (response.status == 'connected') {
		onLogin(response);
	  } else {
		// Otherwise, show Login dialog first.
		FB.login(function(response) {
		  onLogin(response);
		}, {scope: 'user_friends, email'});
	  }
	});
	
	
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<?php }?>

</head>

<body <?php body_class()?>>


<div id="loader-wrapper">
    <div id="loader"></div>
</div>


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
      	<div class="row">
      	
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand logo" href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" /></a>
            </div>
            <div class="navbar-collapse collapse">
              
              <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav navbar-nav navbar-right' , 'theme_location' => 'primary' ) ); ?>
            	<div class="clear"></div> 
            </div><!--/.nav-collapse -->
                        
      	</div>
      </div>
</div>