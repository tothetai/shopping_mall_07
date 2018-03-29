<a href="{{url('cart')}}">
	<div>
		<img class="mg_bt_10" src="assets/img/cart.png" alt="" height="31" width="31">
	</div>
	<div class="cart-box">
		<span id="cart-total" class="count_item_pr cartCount">{{Cart::count()}}</span>
	</div>
</a>