<!DOCTYPE html>
<!-- saved from url=(0043)http://www.mikeinghamdesign.com/contact.php -->
<html lang="en-gb" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
    <link href="http://www.mikeinghamdesign.com/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://www.mikeinghamdesign.com/css/styles.css" rel="stylesheet">


      </head>
      <body id="top" style="background-color:#f3f5f8">
        <header id="home">
		            <nav>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                  <nav class="pull">
                    <ul class="top-nav">
                      <li><a href="#">Home <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="#">Portfolio <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="#">About <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="./Design_files/Design.html">Get in Touch <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </nav>          <section class="inner-hero about">
            <div class="container">
              <div class="row">
              	<div class="col-xs-8">
              		<a href="#" class="logo">Register</a>
              	</div>
                <div class="col-xs-4 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>
            </div>
          </section>
        </header>

        <section class="intro text-center section-padding" id="features">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
            	<h1 class="inner-title">Welcome</h1>
              </div>
              <div class="col-md-6 col-md-offset-3">
      <div class="features-wrapper">
			<form method="post" action="add" name="contactform" id="contactform" onsubmit="return check()">
     <div>
				<div class="row"><div class="field"><input type="text" id="name" name="name" placeholder="Your Name"></div></div>
				<div class="row"><div class="field"><input type="password" name="password" id="password" placeholder="Password"></div></div>
        <div class="row"><div class="field"><input type="email" id="email" name="email" placeholder="Your Email"></div></div>
		</div>
				<input type="submit" class="button" value="注册" id="fuckbitch" style="font-size: large"/>
		</form>
			<div style="clear: both;"> </div>
		</div>
      <div class="clearfix"></div>    
    </body>
<script src="common/js/jquery-1.6.min.js" type="text/javascript"></script>    
<script type="text/javascript">
  function check(){
    var name=$('#name').val();
    var pwd=$('#password').val();
    var email=$('#email').val();
    if(name.trim()==''){
      $('#name').focus();
      return false;
    }
     if(pwd.trim()==''){
     $('#name').focus();
      return false;
    }
    if(email.trim()==''){
      return false;
    }
  }
</script>
</html>