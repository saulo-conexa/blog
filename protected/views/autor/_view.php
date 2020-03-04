<?php
/* @var $this AutorController */
/* @var $data Autor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkExterno')); ?>:</b>
	<?php echo CHtml::encode($data->linkExterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sobre')); ?>:</b>
	<?php echo CHtml::encode($data->sobre); ?>
	<br />


</div>