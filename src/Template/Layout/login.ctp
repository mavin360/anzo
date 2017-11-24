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
        <?php echo $cakeDescription; ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php //$this->Html->meta('icon') ?>

    <?php echo $this->Html->css('style.default.css'); ?>

    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
	
</head>
<body class="signin">
 
    <?php //echo $this->Flash->render(); ?>
    <div class="container clearfix">
        <?php echo $this->fetch('content'); ?>
    </div>
    <footer>
	<div class="signup-footer">
            <div class="">
                &copy; 2017. All Rights Reserved.
            </div>
           
        </div>
		
    </footer>
</body>
</html>
