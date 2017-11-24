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
<?php //pr($page);?>


<div class="banner_section">
<div class="container">
  <div class="orderbtn text-center"><a href="<?php echo $setting['order_online_url'];?>">ORDER ONLINE</a></div>
</div>
<?php $header=$this->Anzo->HeaderModule($page['id']);
if($header){
	echo $header;
}else{
?>
  <?php if($page['page_header_image']){?>
  <img src="<?php echo $this->request->webroot; ?>img/PagesImages/original/<?php echo $page['page_header_image']?>" alt="<?php echo $page['page_title']?>" class="img-responsive">
  <?php }else{?>
  <img src="<?php echo $this->request->webroot; ?>front/images/banner1.jpg" alt="<?php echo $page['page_title']?>" class="img-responsive">
  <?php }?>
<?php }?>
</div>
<?php if($page['sections']){
	foreach($page['sections'] as $indx=>$section){
	if($page['selected_module']){
		$secCount= count($page['sections']);
		if($indx==$secCount-1){
			$tempClass='nofooter';
		}else{
			$tempClass='';
		}
	}
	if($indx==0 && $this->request->params['pass'][0]=='career'){
		$jClass='values-list';
	}else{
		$jClass='';
	}
?>
 <div class="divider_sec <?php echo $tempClass;?> <?php echo $jClass.'  '.$page['page_slug'];?> " >
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 textcontent">
		  <h3 class="text-center">
		  <?php 
			$img='front/images/'.strtolower(str_replace(' ','-',$section['section_title'])).'.png'; ?>
			<?php
			if (file_exists($img)) { ?>
			<img src="<?php echo $img;?>" alt="<?php echo $section['section_title'];?>">	
			<?php }else{
			echo  $section['section_title'];
			}
			?>
            </h3>
            <?php echo $section['section_text']?>
          </div>
        </div>
      </div>
    </div>
	<?php }}?>
	<?php if($page['selected_module']){
		echo $this->Anzo->PageModule($page['selected_module'],$page['module_id']);
	}?>




