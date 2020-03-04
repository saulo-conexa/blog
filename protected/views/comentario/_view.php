<?php
/* @var $this ComentarioController */
/* @var $data Comentario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPost')); ?>:</b>
	<?php echo CHtml::encode($data->idPost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtdCurtidas')); ?>:</b>
	<?php echo CHtml::encode($data->qtdCurtidas); ?>
	<br />


</div>