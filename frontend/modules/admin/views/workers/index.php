<?php 
	$this->menuActiveItems[AdminController::WORKERS_MENU_ITEM] = 1;
?>
<?php $this->renderPartial('//../modules/'.Yii::app()->controller->module->id.'/views/partial/sidebar') ?>
<div class="gray-line"></div>
<div class="content">
	<div class="content-gray-bg">
		<div class="content-white-bg with-button">
			
			<table class="content-table">
				<thead>
					<tr>
						<td class="table-width-1">№</td>
						<td>ФИО</td>
						<td>Паспортные данные</td>
						<td>Телефон</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div class="button center-button">Добавить</div>
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>