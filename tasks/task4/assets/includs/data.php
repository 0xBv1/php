<?php
echo "<h1>Welcome to the product page!</h1>";
$products = [
    ['name' => 'francesco', 'price' => '100$', 'color' => 'red & green', 'id' => '1'],
    ['name' => 'guido', 'price' => '200$', 'color' => 'blue', 'id' => '2'],
    ['name' => 'Mack', 'price' => '300$', 'color' => 'red', 'id' => '3'],
    ['name' => 'mcqueen', 'price' => '400$', 'color' => 'red', 'id' => '4'],
    ['name' => 'tow-mater', 'price' => '150$', 'color' => 'brown', 'id' => '5']
];

echo '<div class="card-g" style="display: flex;">';

foreach ($products as $product) {
    
    echo '
        <div class="card" style="display: flex;">
            <img src="'.'/my-php/task4/assets/imgs/'.strtolower(str_replace(' ', '-', $product['name'])) . '.png'.'" class="img-thumbnail" alt="' . $product['name'] . '">
            <div class="card-body">
                <h5 class="card-title">' . $product['name'] . '</h5>
                <p class="card-text">Price: ' . $product['price'] . '</p>
                <p class="card-text">Color: ' . $product['color'] . '</p>
                <a href="#" class="btn btn-primary">Buy</a>
            </div>
        </div>
    ';
}

echo '</div>';
