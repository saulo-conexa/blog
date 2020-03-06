<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('titulo')); ?>:
	<?php echo GxHtml::encode($data->titulo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('texto')); ?>:
	<?php echo GxHtml::encode($data->texto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('destaque')); ?>:
	<?php echo GxHtml::encode($data->destaque); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dataPublicacao')); ?>:
	<?php echo GxHtml::encode($data->dataPublicacao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idAutor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->autor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idCategoria')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->categoria)); ?>
	<br />

</div>