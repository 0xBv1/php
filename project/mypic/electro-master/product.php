<?php
include ("header.php");
$products = sqlread("SELECT * FROM products");
// var_dump($products);
$id_selected_product = $_GET['id_product'];
// var_dump($id_selected_product);
foreach ($products as $product) {
	if ($product['id_p'] == $id_selected_product) {
		$img = $product['img'];
		$p_name = $product['product_names'];
		$description = $product['descriptions'];
		$price = $product['prices'];
		// $price_new = $product[''];
		$discountAmount = $product['discounts'];
		$categore = $product['categores'];
		$rate = $product['rate'];
		$count = $product['count'];
		// var_dump($img ,"<br>",
		// $p_name ,"<br>",
		// $description,"<br>",
		// $price ,"<br>",
		// // $price_new,'<br',
		// $discountAmount,"<br>",
		// $categore,"<br>",
		// $rate,"<br>",
		// $count);


	}
}

?>


<!-- SECTION -->
<div class="section">
	<div class="container">
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<?php foreach ($products as $product): ?>

						<div class="product-preview">
							<img src="../dash/<?= $img ?>" alt="">
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2 col-md-pull-5">

			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name"><?= $p_name ?></h2>
					<div>
						<div class="product-rating">
							<?php for ($i = 0; $i < 5; $i++): ?>
								<?php if ($i < $rate): ?>
									<i class="fa fa-star"></i>
								<?php else: ?>
									<i class="fa fa-star-o"></i>
								<?php endif; ?>
							<?php endfor; ?>
						</div>
						<a class="review-link" href="#">10 Review(s) | Add your review</a>
					</div>
					<div>
						<h3 class="product-price">$<?= $price - ($price * $discountAmount / 100); ?>
							<del class="product-old-price">$<?= $price ?></del>
						</h3>

						<?php if ($count > 0): ?>
							<span class="product-available">In Stock</span>
							<p><?php echo $products[0]['descriptions']; ?></p>

							<div class="product-options">

							</div>

							<div class="add-to-cart">
								<form method="post"
									action="cart.php?id_product=<?= htmlspecialchars($id_selected_product); ?>">
									<div class="qty-label">
										Qty
										<div class="input-number">
											<input name="Qty" type="number" id="quantity-input" required>
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to
										cart</button>
								</form>
							</div>


						<?php else: ?>

							<span class="product-available">out of stock</span>


						<?php endif; ?>
					</div>

					<ul class="product-links">
						<li>Category:</li>
						<li><a href="#"><?php echo $products[0]['categores']; ?></a></li>
					</ul>

					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p><?= $description ?></p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->


					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
	</div>
</div>
<!-- /SECTION -->
<?php include ("footer.php"); ?>