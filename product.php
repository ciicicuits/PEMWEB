<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-screen-lg mx-auto py-8">
    <!-- Loop untuk menampilkan produk -->
    <?php
    $products = [
        1 => ["name" => "Rose Flower", "price" => 50000, "image" => "IMG/bunga.jpg"],
        2 => ["name" => "Pink Flower", "price" => 75000, "image" => "IMG/img-2.png"],
        3 => ["name" => "Yellow Flower", "price" => 65000, "image" => "IMG/img-3.png"],
        4 => ["name" => "White Flower", "price" => 90000, "image" => "IMG/img-4.png"],
        5 => ["name" => "Flower Pot 1", "price" => 100000, "image" => "IMG/img-5.png"],
        6 => ["name" => "Flower Pot 2", "price" => 125000, "image" => "IMG/img-6.png"],
        7 => ["name" => "Flower Pot 3", "price" => 140000, "image" => "IMG/img-7.png"],
        8 => ["name" => "Flower Pot 4", "price" => 200000, "image" => "IMG/img-8.png"],
        9 => ["name" => "Flower Pot 5", "price" => 190000, "image" => "IMG/img-9.png"]
    ];

    foreach ($products as $id => $product) {
        echo "
        <div class='bg-white p-4 rounded-lg shadow-md'>
            <a href='checkout.php?product_id=$id' class='group block'>
                <!-- Gambar Produk -->
                <div class='relative overflow-hidden'>
                    <img src='{$product['image']}' alt='{$product['name']}' class='h-48 w-full object-cover rounded-lg'/>
                </div>
                <div class='mt-4'>
                    <!-- Nama Produk -->
                    <h3 class='font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4'>{$product['name']}</h3>
                    <!-- Harga Produk -->
                    <p class='mt-1 text-sm text-gray-700'>Rp. " . number_format($product['price'], 0, ',', '.') . "</p>
                    <!-- Tombol Checkout -->
                    <a href='checkout.php?product_id=$id' class='mt-3 inline-block px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600'>
                        Checkout
                    </a>
                </div>
            </a>
        </div>
        ";
    }
    ?>
</div>
