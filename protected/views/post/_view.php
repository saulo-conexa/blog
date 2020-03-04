<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destaque')); ?>:</b>
	<?php echo CHtml::encode($data->destaque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataPublicacao')); ?>:</b>
	<?php echo CHtml::encode($data->dataPublicacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAutor')); ?>:</b>
	<?php echo CHtml::encode($data->idAutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria); ?>
	<br />


</div>