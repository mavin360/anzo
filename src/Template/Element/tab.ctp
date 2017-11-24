<?php //pr($data);?>
<div class="<?php if($show_no=='yes'){echo 'build_container catergory_sec';}else{ echo 'catergory_sec sweet_sides';}?>">
  <div class="container">	
	<?php if($show_no=='yes'){?>
			<?php $i=0; foreach($data as $dt){ ?>
			   <div class="build-title">
                    <img src="<?php echo $this->request->webroot; ?>front/images/<?php echo $i+1;?>.png" alt="<?php echo $i+1;?>">
                    <h1><?php echo $dt['name'];?><span><?php echo $dt['desc'];?></span></h1>
                </div>
				<?php if($dt['layout_style']=='circular'){ 
					if($dt['layout_col']=='one_col'){
						$col='onecol';
					}elseif($dt['layout_col']=='two_col'){
						$col='twocol';
					}else if($dt['layout_col']=='three_col'){
						$col='threecol';
					}else if($dt['layout_col']=='four_col'){
						$col='';
					}else{
						$col='';
					}
				?> 
                <div class="build-item <?php echo $col;?>">
                    <ul>
					<?php foreach($dt['Items'] as $item){?>
                        <li>
                           <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive">
                            <div class="hovercontent">
                              <h4><?php echo $item['product_title'];?></h4>
							  <p><?php echo $item['product_desc'];?></p>
						  </div>
                        </li>
					<?php }?>
                    </ul>
                </div>
				<?php }elseif($dt['layout_style']=='rectangle'){?>
				
				<div class="col-md-12 col-sm-12 <?php echo $dt['layout_style'];?>">
				<div class="row text-center">
				<?php foreach($dt['Items'] as $item){
					if($dt['layout_col']=='one_col'){
						$col='col-md-12 col-sm-12 col-xs-12 nopad';
					}else if($dt['layout_col']=='two_col'){
						$col='col-md-6 col-sm-6 col-xs-6 nopad towcol';
					}else if($dt['layout_col']=='three_col'){
						$col='col-md-4 col-sm-4 col-xs-6 nopad';
					}else if($dt['layout_col']=='four_col'){
						$col='col-md-3 col-sm-3 col-xs-6 nopad';
					}else{
						$col='col-md-4 col-sm-4 col-xs-6 nopad';
					}
					?>
                  <div class="<?php echo $col;?>">
                    <div class="rolloverox">
						<?php if($dt['layout_col']=='two_col'){?>
                        <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/original/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive" height="300">
					<?php }else{?> 
						<img src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive">
						<?php }?>
                        <div class="hovercontent">
                          <h4><?php echo $item['product_title'];?></h4>
                          <p><?php echo $item['product_desc'];?></p>
                        </div>
                    </div>
                  </div>
				  
				<?php }?>
				</div>
				</div>
				
				<?php }else{?>
				<div class="build-item toping">
                    <img src="<?php echo $this->request->webroot; ?>img/SubCategoriesImages/original/<?php echo $dt['sub_category_image'];?>" alt="<?php echo $dt['name'];?>" class="img-responsive">
                </div>
				<?php } ?>
				<?php $i++;}?>
			
		<?php }else{?>  
			
			<div class="row">
			<?php $i=0; foreach($data as $dt){ ?>
			    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
					<h3 class="common_head"><?php echo $dt['name'];?></h3>
               </div>
			<?php if($dt['layout_style']=='circular'){ ?>   
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 <?php echo $dt['layout_style'];?>">
				<div class="row text-center">
				<?php foreach($dt['Items'] as $item){
					if($dt['layout_col']=='one_col'){
						$col='col-md-12 col-sm-12 col-xs-12';
					}else if($dt['layout_col']=='two_col'){
						$col='col-md-6 col-sm-6 col-xs-6';
					}else if($dt['layout_col']=='three_col'){
						$col='col-md-4 col-sm-4 col-xs-6';
					}else if($dt['layout_col']=='four_col'){
						$col='col-md-3 col-sm-3 col-xs-6';
					}else{
						$col='col-md-4 col-sm-4 col-xs-6';
					}
					?>
                  <div class="<?php echo $col;?>">
                    <div class="rolloverox">
                        <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive">
                        <div class="hovercontent">
                          <h4><?php echo $item['product_title'];?></h4>
                          <p><?php echo $item['product_desc'];?></p>
                        </div>
                    </div>
                  </div>
				<?php }?>
				</div>
				</div>
			<?php }else if($dt['layout_style']=='rectangle'){?>
			<div class="col-md-12 col-sm-12 <?php echo $dt['layout_style'];?>">
				<div class="row text-center">
				<?php foreach($dt['Items'] as $item){
					if($dt['layout_col']=='one_col'){
						$col='col-md-12 col-sm-12 col-xs-12 nopad';
					}else if($dt['layout_col']=='two_col'){
						$col='col-md-6 col-sm-6 col-xs-6 nopad towcol';
					}else if($dt['layout_col']=='three_col'){
						$col='col-md-4 col-sm-4 col-xs-6 nopad';
					}else if($dt['layout_col']=='four_col'){
						$col='col-md-3 col-sm-3 col-xs-6 nopad';
					}else{
						$col='col-md-4 col-sm-4 col-xs-6 nopad';
					}
					?>
                  <div class="<?php echo $col;?>">
                    <div class="rolloverox">
					<?php if($dt['layout_col']=='two_col'){?>
                        <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/original/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive" height="300">
					<?php }else{?>
					 <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive" >
					<?php }?>
                        <div class="hovercontent">
                          <h4><?php echo $item['product_title'];?></h4>
                          <p><?php echo $item['product_desc'];?></p>
                        </div>
                    </div>
                  </div>
				<?php }?>
				</div>
				</div>
			<?php }else{?>
			<div class="col-md-12 col-sm-12">
				<div class="row text-center">
				<?php foreach($dt['Items'] as $item){
					if($dt['layout_col']=='two_col'){
						$col='col-md-6 col-sm-6 col-xs-6';
					}else if($dt['layout_col']=='three_col'){
						$col='col-md-4 col-sm-4 col-xs-6';
					}else if($dt['layout_col']=='four_col'){
						$col='col-md-3 col-sm-3 col-xs-6';
					}else{
						$col='col-md-4 col-sm-4 col-xs-6';
					}
					?>
                  <div class="<?php echo $col;?>">
                    <div class="rolloverox">
                        <img src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo $item['product_image'];?>" alt="<?php echo $item['product_title'];?>" class="img-responsive">
                        <div class="hovercontent">
                          <h4><?php echo $item['product_title'];?></h4>
                          <p><?php echo $item['product_desc'];?></p>
                        </div>
                    </div>
                  </div>
				<?php }?>
				</div>
				</div>
			<?php }?>
			<?php $i++;}?>
			  </div>
	<?php }?>
          </div>
        </div>