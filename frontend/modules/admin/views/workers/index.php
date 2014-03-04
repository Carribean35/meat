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
						<td>Место</td>
						<td>Логин</td>
						<td class="table-width-1"></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($model->search()->getData() AS $key => $val) :?>
					<tr>
						<td><?php echo $key + 1;?></td>
						<td><?php echo $val->fio?></td>
						<td><?php echo $val->pasport?></td>
						<td><?php echo $val->phone?></td>
						<td><?php echo $val->place[$val['idPlace']]?></td>
						<td><?php echo $val->login?></td>
						<td><a href="/admin/workers/delete/<?php echo $val->id?>/" class="confirmDelete">x</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			
		</div>
		<a href="/admin/workers/item/" class="noLine">
			<div class="button center-button">Добавить</div>
		</a>
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>