<?php if($data){?> 
    <div class="location_container">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
		  <?php $i=0; foreach($data as $key=>$loctions){ $i++;
				if($i>1){
					echo '<div class="pad20"></div>';
				}
		  ?>
		  
            <h3 class="title"><span class="col-md-6 col-sm-6">&nbsp;</span><span class="col-md-6 col-sm-6 text-left"><?php echo $key;?></span></h3>
			<?php foreach($loctions as $loc){?>
            <div class="row">
              <div class="col-md-6 col-sm-6 text-center">
			  <?php if($loc['store_image']){?>
				<img src="<?php echo $this->request->webroot; ?>img/StoresImages/big/<?php echo $loc['store_image'];?>" alt="<?php echo $loc['store_title'];?>" width="100%">
			  <?php }else{?>
                <img src="<?php echo $this->request->webroot; ?>front/images/location.jpg" alt="location">
			  <?php }?>	
              </div>
              <div class="col-md-6 col-sm-6 address">
                <h3><?php echo $loc['store_title'];?></h3>
                <p><?php echo $loc['store_address'];?></br><?php echo $loc['store_pin'];?></p>
                <span><?php echo $loc['store_phone'];?></span>
				<?php if($loc['store_location_days_times']){
					foreach($loc['store_location_days_times'] as $daytime){
				?>
               <strong><?php echo $daytime['from_open_day'].'-'.$daytime['to_open_day'].', '.$daytime['from_open_time'].'-'.$daytime['to_open_time'];?></strong>
				<?php }}?>
              </div>
            </div>
		<?php }?>
		<?php }?>	
			
          </div>
        </div>
      </div>
    </div>
<?php }?>	