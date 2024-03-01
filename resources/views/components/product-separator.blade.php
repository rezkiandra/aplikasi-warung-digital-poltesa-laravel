<div class="card mb-4">
	<div class="card-widget-separator-wrapper">
		<div class="card-body card-widget-separator">
			<div class="row gy-4 gy-sm-1">
				<x-product-card :datas="$products" :label="'Total Products'" :icon="'cart-outline'" :variant="'primary'" :growth="'danger'"
					:class="'border-end'" />
				<x-product-card :datas="$products" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'" :growth="'danger'"
					:class="'border-end'" />
				<x-product-card :datas="$products" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'" :growth="'danger'"
					:class="'border-end'" />
				<x-product-card :datas="$products" :label="'Sold Out'" :icon="'sale-outline'" :variant="'dark'"
					:growth="'danger'" />
			</div>
		</div>
	</div>
</div>