<?php 
	$this->menuActiveItems[AdminController::PRODUCTS_MENU_ITEM] = 1;
?>
<?php $this->renderPartial('//../modules/'.Yii::app()->controller->module->id.'/views/partial/sidebar') ?>
<div class="gray-line"></div>
<div class="content">
	<div class="content-gray-bg">
		<div class="content-white-bg with-button">
			
			<table class="content-table">
				<thead>
					<tr>
						<td>Наименование продукции</td>
						<td>Место</td>
						<td>Цена</td>
						<td>Измерение (кг)</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($model->search()->getData() AS $key => $val) :?>
					<tr>
						<td><?php echo $val->product->name?></td>
						<td><?php echo $val->place[$val['idPlace']]?></td>
						<td><?php echo $val->price?></td>
						<td><?php echo $val->measuring?></td>
						<td><a href="/admin/products/delete/<?php echo $val->id?>/" class="confirmDelete">x</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			
		</div>
		<a href="/admin/products/item/" class="noLine">
			<div class="button center-button">Добавить</div>
		</a>
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>