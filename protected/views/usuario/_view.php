<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('senha')); ?>:
	<?php echo GxHtml::encode($data->senha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sobre')); ?>:
	<?php echo GxHtml::encode($data->sobre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('linkExterno')); ?>:
	<?php echo GxHtml::encode($data->linkExterno); ?>
	<br />

</div>