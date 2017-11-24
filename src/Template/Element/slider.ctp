<?php //pr($data['gallery_images']);?> 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  <?php foreach($data['gallery_images'] as $indx=>$img){ ?>
		<div class="item <?php if($indx==0){echo 'active';}?>">
		  <img src="<?php echo $this->request->webroot; ?>img/GalleriesImages/original/<?php echo $img['image']; ?>" alt="" class="img-responsive" width="100%">
		</div>
	  <?php }?>	
	  </div>
	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	  <?php foreach($data['gallery_images'] as $indx=>$img){ ?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $indx;?>" class="<?php if($indx==0){echo 'active';}?>"></li>
	  <?php }?>
	  </ol>
</div>