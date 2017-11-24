<?php if($data['gallery_images']){?> 
    <div class="divider_sec mission-content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 textcontent text-center">
            <div class="row gridimages" id="lightgallery">
			<?php foreach($data['gallery_images'] as $img){?>
                <div class="col-md-4 col-sm-4 col-xs-6" data-src="<?php echo $this->request->webroot; ?>img/GalleriesImages/original/<?php echo $img['image'];?>"><img src="<?php echo $this->request->webroot; ?>img/GalleriesImages/big/<?php echo $img['image'];?>" alt="<?php echo $img['image_title'];?>" class="img-responsive"></div>
			<?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }?>	