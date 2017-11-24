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
?>
<?php //pr($setting);?>
    <div class="banner_section home">
        <div class="orderbtn text-center"><a href="<?php echo $setting['order_online_url'];?>">ORDER ONLINE</a></div>
		<?php echo $this->element('slider',['data'=>$homeSlider]);?>
    </div>
    <div class="secondary_menu">
      <div class="container">
	  <?php if($allCategories){?>
        <ul>
		<?php foreach($allCategories as $indx=>$cat){?>
          <li class="<?php if($indx==0){echo 'active';}?>"><a href="#tab<?php echo $indx;?>"><?php echo strtoupper($cat->category_title);?></a></li>
		<?php }?>
          
        </ul>
	 
        <div class="mobile-bg"></div>
		
        <div class="menutagline">
		<?php foreach($allCategories as $indx=>$cat){?>
            <div class="tab-content <?php if($indx==0){echo 'active';}?>">
              <h4><?php echo strtoupper($cat->category_title);?></h4>
              <p><?php echo $cat->category_desc;?> </p>
            </div>
			<?php }?>
        </div>
		 <?php }?>
      </div>
    </div>

    <div class="secondary_tabs">
	<?php if($allCategories){?>
	<?php foreach($allCategories as $indx=>$cat){?>
	<div class="tab-content <?php if($indx==0){echo 'active';}?>" id="tab<?php echo $indx;?>">
       <?php echo $this->Anzo->TabItemList($indx+1,$cat->id,$cat->show_no); ?>
	  </div>
	<?php }}?>
	
	</div>



