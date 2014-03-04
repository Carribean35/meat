<?php
/* @var $this MarketController */
/* @var $model Market*/

$this->title_h3='Магазины';

$this->breadcrumbs=array(
	'Магазины'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('market/item').'"><i class="icon-plus"></i>Добавить магазин</a>
							</li>';

$this->menuActiveItems[BController::MARKET_MENU_ITEM] = 1;
?>
<div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$model->search(),
				'filter'=>null,
				'enableSorting'=>false,
				'htmlOptions'=>array('class'=>'portlet-body'),
				'itemsCssClass'=>'table table-striped table-hover',
				'summaryText'=>'',
				'loadingCssClass'=>'',
				'columns'=>array(
					array(
						'header'=>Yii::t('main','ID'),
						'name'=>'id',
					),
					array(
						'header'=>Yii::t('main','Name'),
						'name'=>'name',
					),
					array(
						'header'=>Yii::t('main','Login'),
						'name'=>'login',
					),
					array(
						'header'=>Yii::t('main','Actions'),
						'class'=>'CButtonColumn',
						'buttons'=>array(
							'view'=>array(
								'label'=>Yii::t('main','Edit'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return $this->createUrl('market/item', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('market/delete', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>