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
  
    <div class="signuppanel">
        
        <div class="row">
            
            <div class="col-md-6">
            
            </div><!-- col-sm-6 -->
            
            <div class="col-md-6">
                	<?php echo $this->Form->create(); ?>
                    <h3 class="nomargin">Sign Up</h3>
                    <div class="mb10">
                        <label class="control-label">Email Address</label>
                       <?php echo $this->Form->control('email',array('class'=>'form-control','label'=>false)); ?>
                    </div>
                    <div class="mb10">
                        <label class="control-label">Password</label>
                        <?php echo $this->Form->control('password',array('class'=>'form-control','label'=>false)); ?>
                    </div>
					<?php echo $this->Form->button('Sign Up',array('class'=>'btn btn-success btn-block')); ?>
               <?php echo $this->Form->end(); ?>
            </div><!-- col-sm-6 -->
            
        </div><!-- row -->
        
    </div><!-- signuppanel -->
  
</section>