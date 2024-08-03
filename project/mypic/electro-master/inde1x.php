<?php


include ("header.php");

$products = sqlread("SELECT * FROM products");
// var_dump($products);

?>


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php foreach ($products as $product):
                                    // Fix the format before decoding
                                    $categories_str = str_replace(['[', ']'], ['["', '"]'], $product['categores']);
                                    $categories_str = str_replace(', ', '","', $categories_str);
                                    $categories = json_decode($categories_str, true);
                                    ?>
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="../dash/<?= $product['img'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($product['discounts'] > 0): ?>
                                                    <span class="sale">-<?php echo $product['discounts']; ?>%</span>
                                                <?php endif; ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo implode(', ', $categories); ?></p>
                                            <h3 class="product-name"><a
                                                    href="product.php?id_product=<?= htmlspecialchars($product['id_p']); ?>"><?php echo $product['product_names']; ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                $<?php echo $product['prices'] - ($product['prices'] * $product['discounts'] / 100); ?>
                                                <del class="product-old-price">$<?php echo $product['prices']; ?></del>
                                            </h4>
                                            <div class="product-rating">
                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                    <i class="fa fa-star<?php echo $i < $product['rate'] ? '' : '-o'; ?>"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                      
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php
include ("footer.php");
?>