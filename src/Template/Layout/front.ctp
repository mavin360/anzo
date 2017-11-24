<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ANZO';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Anzo Signature
    </title>
    <?php //$this->Html->meta('icon') ?>
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $this->request->webroot; ?>front/css/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $this->request->webroot; ?>front/css/responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $this->request->webroot; ?>front/fonts/fonts.css">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo $this->request->webroot; ?>front/css/lightgallery.css">
	<script>var base_url="<?php echo $this->request->webroot; ?>";</script>
</head>
<body>
  <header>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <a href="<?php echo $this->request->webroot; ?>" class="logo"><img src="<?php echo $this->request->webroot; ?>front/images/logo.png" alt=""></a>
          </div>
          <div class="col-md-9 col-sm-9 text-right">
            <nav>
			
              <strong><i class="fa fa-bars"></i></strong>
              <ul>
                <li <?php if(empty($this->request->params['pass'])){?>class="active"<?php }?>><a href="<?php echo $this->request->webroot; ?>">OUR MENU</a></li>
                <li <?php if($this->request->params['pass'][0]=='history'){?>class="active"<?php }?>><a href="<?php echo $this->request->webroot; ?>history">OUR STORY</a></li>
                <li <?php if($this->request->params['pass'][0]=='location'){?>class="active"<?php }?>><a href="<?php echo $this->request->webroot; ?>location">LOCATIONS</a></li>
                <li <?php if($this->request->params['pass'][0]=='career'){?>class="active"<?php }?>><a href="<?php echo $this->request->webroot; ?>career">JOIN US</a></li>
                <!-- <li><a href="#">SHOP</a></li> -->
              </ul>
              <span class="orderbtn"><a href="<?php echo $setting['order_online_url'];?>">ORDER ONLINE</a></span>
            </nav>
          </div>
        </div>
      </div>
    </header>
 <?php echo $this->fetch('content'); ?> 
   <footer>
        <div class="container text-center">
          <div class="row">
          <div class="col-md-4 col-sm-4">
                  <h4>LET’S CONNECT</h4>
            <p>See what else we’re up to</p>
            <ul class="social_links">
              <li class="instagram"><a href="<?php echo $setting['instagram_url'];?>"></a></li>
              <li class="tweet"><a href="<?php echo $setting['twitter_url'];?>"></a></li>
              <li class="facebook"><a href="<?php echo $setting['fb_url'];?>"></a></li>
            </ul>
            <a href="#"><img src="<?php echo $this->request->webroot; ?>front/images/footer-logo.jpg" alt=""></a>
          </div>
          <div class="col-md-4 col-sm-4">
            <h4>STAY IN THE LOOP</h4>
            <p>Sign up for email updates</p>
            <form action="#" id="fsubs" onSubmit="subscribe('fsubs');return false;">
              <input type="email" placeholder="Your email address" name="email"><br>
              <button type="button" onClick="subscribe('fsubs');" >Submit</button>
			  <div class="msg">
				</div>
            </form>
          </div>
          <div class="col-md-4 col-sm-4 hidden-xs">
            <h4>QUESTIONS OR COMMENTS?</h4>
            <p>We’d love to hear from you!</p>
            <ul class="contact">
              <li><a href="#" class="email"><?php echo $setting['help_email'];?></a></li>
              <li><a href="#" class="phone"><?php echo $setting['help_phone'];?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <div class="sticky-footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <a  href="javascript:void(0)" class="calci">NUTRITION CALCULATOR</a>
                    <div class="emailsec">
                        <input type="text" placeholder="your email address">
                        <input type="submit">
                        <p>THANK YOU! <span>We’ll keep you in the loop.</span></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <ul class="social">
                        <li class="insta"><a href="<?php echo $setting['instagram_url'];?>"></a></li>
                        <li class="tweet"><a href="<?php echo $setting['twitter_url'];?>"></a></li>
                        <li class="facebook"><a href="<?php echo $setting['fb_url'];?>"></a></li>
                        <li class="email"><a href="mailto:hello@anzo.com"></a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a  href="<?php echo $setting['app_url'];?>" class="app">DOWNLOAD OUR APP</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
              <h1>WELCOME!</h1>
              <h2>STAY IN THE LOOP</h2>
              <p>Sign up for email updates</p>
              <form id="msubs" onSubmit="subscribe('fsubs');return false;">
                <input type="email" placeholder="your email address" name="email"> <br>
                <button type="button" onClick="subscribe('msubs');">Submit</button>
				<div class="msg">
				</div>
              </form>
              <button type="button" class="btn close-btn" onClick="modalClose();">x</button>
          </div>
        </div>
      </div>
    </div>
    <a href="#" class="backtotop"><i class="fa fa-chevron-up"></i> <br>TOP</a>
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->request->webroot; ?>front/js/lightgallery.js"></script>
    <script type="text/javascript" src="<?php echo $this->request->webroot; ?>front/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->request->webroot; ?>front/js/index.js"></script>
</body>
</html>