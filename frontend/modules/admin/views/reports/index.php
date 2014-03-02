<?php 
	$this->menuActiveItems[AdminController::REPORTS_MENU_ITEM] = 1;
?>
<?php $this->renderPartial('//../modules/'.Yii::app()->controller->module->id.'/views/partial/sidebar') ?>
<div class="gray-line"></div>
<div class="content">
	<div class="content-gray-bg">
		<div class="content-white-bg">
			
			<table class="content-table">
				<thead>
					<tr>
						<td>Дата</td>
						<td>Приход (кг)</td>
						<td>Приход (сумма)</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>