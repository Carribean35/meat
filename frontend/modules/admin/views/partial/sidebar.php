<ul class="tabs-block">
	<li class="tab-item z6 <?php if (!empty($this->menuActiveItems[AdminController::WAREHOUSE_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/warehouse/">
				Склад
			</a>
		</div>
	</li>		
	<li class="tab-item z5 <?php if (!empty($this->menuActiveItems[AdminController::TRADING_ROOM_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/tradingRoom/">
				Торговый зал
			</a>
		</div>			
	</li>
	<li class="tab-item z4 <?php if (!empty($this->menuActiveItems[AdminController::WORKERS_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/workers/">
				Работники
			</a>
		</div>			
	</li>
	<li class="tab-item z3 <?php if (!empty($this->menuActiveItems[AdminController::SUPPLIERS_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/suppliers/">
				Поставщики
			</a>
		</div>			
	</li>
	<li class="tab-item z2 <?php if (!empty($this->menuActiveItems[AdminController::PRODUCTS_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/products/">
				Продукция
			</a>
		</div>			
	</li>
	<li class="tab-item z1 <?php if (!empty($this->menuActiveItems[AdminController::REPORTS_MENU_ITEM])) { echo 'active'; } ?>">
		<div class="tab-item-center">
			<a href="/admin/reports/">
				Отчеты
			</a>
		</div>			
	</li>
	<li class="clear"></li>
</ul>