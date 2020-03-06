<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu = array(
	array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
	array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->id)),
	array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>
<div>

	<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			'titulo',
			'texto',
			'destaque:boolean',
			'dataPublicacao',
			array(
				'name' => 'autor',
				'type' => 'raw',
				'value' => $model->autor !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->autor)), array('autor/view', 'id' => GxActiveRecord::extractPkValue($model->autor, true))) : null,
			),
			array(
				'name' => 'categoria',
				'type' => 'raw',
				'value' => $model->categoria !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->categoria)), array('categoria/view', 'id' => GxActiveRecord::extractPkValue($model->categoria, true))) : null,
			),
		),
	)); ?>

	<h2><?php echo GxHtml::encode($model->getRelationLabel('comentarios')); ?></h2>
	<?php
	echo GxHtml::openTag('ul');
	foreach ($model->comentarios as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('comentario/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
	?>
</div>