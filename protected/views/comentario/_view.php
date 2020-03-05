<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('texto')); ?>:
	<?php echo GxHtml::encode($data->texto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idPost')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPost0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('qtdCurtidas')); ?>:
	<?php echo GxHtml::encode($data->qtdCurtidas); ?>
	<br />

</div>