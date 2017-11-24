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
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $cakeDescription; ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php //$this->Html->meta('icon'); ?>
    <?php echo $this->Html->css('style.default.css'); ?>
	<script src="<?php echo $this->request->webroot; ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo $this->request->webroot; ?>js/jquery-migrate-1.2.1.min.js"></script>
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
<script src="<?php echo $this->request->webroot; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/modernizr.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/toggles.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/jquery.cookies.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/custom.js"></script>
</head>
<body> 
<section>
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><a href="<?php echo $this->request->webroot; ?>admin" class="logo"><img src="<?php echo $this->request->webroot; ?>front/images/logo.png" alt=""></a></h1>
    </div><!-- logopanel -->
      <?php 
		$cnt=$this->request->params['controller'];
		$action=$this->request->params['action'];
		$iconTmpl=[''=>'fa fa-home','Users'=>'fa fa-user','Settings'=>'fa fa-cog','Sliders'=>'fa fa-picture-o','Dashboard'=>'','Categories'=>'','Items'=>'','Pages'=>'','Galleries'=>'fa fa-camera','StoreLocations'=>'fa fa-map-marker','Jobs'=>'fa fa-suitcase'];
	  ?>  
    <div class="leftpanelinner">
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="<?php if($cnt=='Dashboard'){echo 'active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
		<!--<li class="nav-parent <?php //if($cnt=='Sliders'){echo 'active nav-active';}?>"><a href="<?php //echo $this->request->webroot; ?>admin/sliders"><i class="fa fa-picture-o"></i> <span>Home Page Slider</span></a>
		<ul class="children">
            <li><a href="<?php //echo $this->request->webroot; ?>admin/sliders"><i class="fa fa-caret-right"></i> Slider List</a></li>
            <li><a href="<?php //echo $this->request->webroot; ?>admin/sliders/add"><i class="fa fa-caret-right"></i> Add New</a></li>
           </ul>
		</li>-->
        <li class="nav-parent <?php if($cnt=='Categories'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/categories"><i class="fa fa-list"></i> <span>Categories</span></a>
		<ul class="children">
            <li><a class="<?php if($cnt=='Categories' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/categories"><i class="fa fa-caret-right"></i> Categories List</a></li>
            <li><a class="<?php if($cnt=='Categories' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/categories/add"><i class="fa fa-caret-right"></i> Add New Category</a></li>
			<li><a class="<?php if($cnt=='Categories' && $action=='listSubcategories'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/categories/list_subcategories"><i class="fa fa-caret-right"></i> Sub Categories List</a></li>
			 <li><a class="<?php if($cnt=='Categories' && $action=='addSubCategory'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/categories/add_sub_category"><i class="fa fa-caret-right"></i> Add New Sub Category</a></li>
           </ul>
		</li>
		 <li class="nav-parent <?php if($cnt=='Items'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/items"><i class="fa fa-list"></i><span>Items</span></a>
		 <ul class="children">
		 <li><a class="<?php if($cnt=='Items' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/items"><i class="fa fa-caret-right"></i> Items List</a></li>
		 <li><a class="<?php if($cnt=='Items' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/items/add"><i class="fa fa-caret-right"></i> Add New Items</a></li>
		 </ul>
		 </li>
		 <li class="nav-parent <?php if($cnt=='Pages'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/pages"><i class="fa fa-list"></i><span>Content Pages</span></a>
		 <ul class="children">
		 <li><a class="<?php if($cnt=='Pages' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/pages"><i class="fa fa-caret-right"></i> Page List</a></li>
		 <li><a class="<?php if($cnt=='Pages' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/pages/add"><i class="fa fa-caret-right"></i> Add New Page</a></li>
		 </ul>
		 </li>
		 <li class="separate"><h5 class="sidebartitle">Modules</h5></li>
		 <li class="nav-parent <?php if($cnt=='Galleries'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/galleries"><i class="fa fa-camera"></i><span>Gallery</span></a>
		 <ul class="children">
		 <li><a class="<?php if($cnt=='Galleries' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/galleries"><i class="fa fa-caret-right"></i> Galleries</a></li>
		 <li><a class="<?php if($cnt=='Galleries' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/galleries/add"><i class="fa fa-caret-right"></i> Add New Gallery</a></li>
		 </ul>
		 </li>
		 <li class="nav-parent <?php if($cnt=='StoreLocations'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/store-locations"><i class="fa fa-map-marker"></i><span>Store Locations</span></a>
		 <ul class="children">
		 <li><a class="<?php if($cnt=='StoreLocations' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/store-locations"><i class="fa fa-caret-right"></i> All Stores</a></li>
		 <li><a class="<?php if($cnt=='StoreLocations' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/store-locations/add"><i class="fa fa-caret-right"></i> New Store Location</a></li>
		 </ul>
		 </li>
		 <li class="nav-parent <?php if($cnt=='Jobs'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/jobs"><i class="fa fa-suitcase"></i><span>Jobs</span></a>
		 <ul class="children">
		 <li><a class="<?php if($cnt=='Jobs' && $action=='jobsCategories'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/jobs/jobs_categories"><i class="fa fa-caret-right"></i>Jobs Categories</a></li>
		 <li><a class="<?php if($cnt=='Jobs' && $action=='index'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/jobs"><i class="fa fa-caret-right"></i>Job List</a></li>
		 <li><a class="<?php if($cnt=='Jobs' && $action=='add'){echo 'active';}?>" href="<?php echo $this->request->webroot; ?>admin/jobs/add"><i class="fa fa-caret-right"></i>Add New Job</a></li>
		 </ul>
		 </li>
		 <li ><hr class="separate" style="margin:0;"></li>
		 <li class="<?php if($cnt=='Settings' && $action=='index'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/settings"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
		 <li class="<?php if($cnt=='Settings' && $action=='subscriptions'){echo 'active nav-active';}?>"><a href="<?php echo $this->request->webroot; ?>admin/settings/subscriptions"><i class="fa fa-users"></i> <span>Subscriptions</span></a></li>
		<li><a href="<?php echo $this->request->webroot; ?>admin/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
      </ul>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
	 <div class="mainpanel">
	 <div class="headerbar">
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      <div class="header-right">
        <ul class="headermenu"> 
		 <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo h($Auth->user('first_name')); ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="<?php echo $this->request->webroot; ?>admin/users/profile"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="<?php echo $this->request->webroot; ?>admin/settings"><i class="fa fa-cog"></i> Settings</a></li>
                <!--<li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>-->
                <li><a href="<?php echo $this->request->webroot; ?>admin/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
		  <li> 
			<button class="btn btn-default tp-icon chat-icon">
                &nbsp;&nbsp;&nbsp;
            </button>
		</li>
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->
    
    <div class="pageheader">
	
      <h2><i class="<?php echo $iconTmpl[$cnt]?$iconTmpl[$cnt]:'fa fa-home'?>"></i> <?php echo $cnt;?> <span><?php echo $action;?></span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo $this->request->webroot; ?>admin/dashboard">ANZO</a></li>
          <li class=""><?php echo $cnt;?></li>
		  <li class="active"><?php echo $action;?></li>
        </ol>
      </div>
    </div>
	<div class="contentpanel"> 
	 
	<?php echo $this->fetch('content'); ?>
	
	</div>
	</div>
</section>

<link rel="stylesheet" href="<?php echo $this->request->webroot; ?>css/bootstrap-timepicker.min.css" />
<script src="<?php echo $this->request->webroot; ?>js/select2.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-timepicker.min.js"></script>
<script>
$(function(){
	$(".selectBox").select2({
		width: '100%'
	  });
	//$('.store-time').timepicker({minuteStep: 15});
});
</script>

</body>
</html>
