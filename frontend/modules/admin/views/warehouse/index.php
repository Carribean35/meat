<?php 
	$this->menuActiveItems[AdminController::WAREHOUSE_MENU_ITEM] = 1;
?>
<?php $this->renderPartial('//../modules/'.Yii::app()->controller->module->id.'/views/partial/sidebar') ?>
<div class="gray-line"></div>
<div class="content">
	<div class="content-gray-bg">
		<div class="content-white-bg">
			
			<table class="content-table">
				<thead>
					<tr>
						<td>Наименование продукции</td>
						<td>Вес (кг)</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>