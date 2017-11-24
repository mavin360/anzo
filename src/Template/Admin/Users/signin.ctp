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
<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-5">
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><a href="<?php echo $this->request->webroot; ?>admin" class="logo"><img src="<?php echo $this->request->webroot; ?>front/images/logo.png" alt=""></a></h1>
                    </div><!-- logopanel -->
                </div>
               
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                <?php echo $this->Flash->render(); ?>
				<?php echo $this->Form->create(); ?>
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access admin.</p>
					<?php echo $this->Flash->render('error'); ?>
					<?php echo $this->Form->control('email',array('class'=>'form-control uname','label'=>false,'placeholder'=>"Email Address",'required'=>true)); ?>
					<?php echo $this->Form->control('password',array('class'=>'form-control pword','label'=>false,'placeholder'=>"Password",'required'=>true)); ?>
                    <?php echo $this->Form->button('Sign In',array('class'=>'btn btn-success btn-block')); ?>  
                <?php echo $this->Form->end(); ?>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
		
    </div><!-- signin -->
  
</section>