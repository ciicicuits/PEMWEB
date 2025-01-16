<?php
// Memulai session
session_start();

// Inisialisasi keranjang belanja jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Definisikan produk yang tersedia
$products = [
    1 => ["name" => "Rose Flower", "price" => 50000, "image" => "IMG/img-1.png"],
    2 => ["name" => "Pink Flower", "price" => 75000, "image" => "IMG/img-2.png"],
    3 => ["name" => "Yellow Flower", "price" => 65000, "image" => "IMG/img-3.png"],
    4 => ["name" => "White Flower", "price" => 90000, "image" => "IMG/img-4.png"],
    5 => ["name" => "Flower Pot 1", "price" => 100000, "image" => "IMG/img-5.png"],
    6 => ["name" => "Flower Pot 2", "price" => 125000, "image" => "IMG/img-6.png"],
    7 => ["name" => "Flower Pot 3", "price" => 140000, "image" => "IMG/img-7.png"],
    8 => ["name" => "Flower Pot 4", "price" => 200000, "image" => "IMG/img-8.png"],
    9 => ["name" => "Flower Pot 5", "price" => 190000, "image" => "IMG/img-9.png"]
];

// Tangkap product_id dari URL
$productId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : null;
$selectedProduct = $productId && isset($products[$productId]) ? $products[$productId] : null;

// Cek apakah data pembayaran sudah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['address'], $_POST['payment_method'])) {
    // Ambil data dari form
    $customerName = htmlspecialchars($_POST['name']);
    $customerAddress = htmlspecialchars($_POST['address']);
    $paymentMethod = htmlspecialchars($_POST['payment_method']);

    if ($selectedProduct) {
        // Tambahkan produk ke keranjang belanja
        $_SESSION['cart'][] = [
            'product_name' => $selectedProduct['name'],
            'product_price' => $selectedProduct['price']
        ];
    }

    // Simpan data pelanggan dan metode pembayaran
    $_SESSION['customer_name'] = $customerName;
    $_SESSION['customer_address'] = $customerAddress;
    $_SESSION['payment_method'] = $paymentMethod;

    // Menampilkan konfirmasi pembayaran
    echo "<h2>Payment Confirmation</h2>";
    echo "<p>Thank you for your purchase, $customerName!</p>";
    echo "<p>Shipping Address: $customerAddress</p>";
    echo "<p>Payment Method: $paymentMethod</p>";

    // Menampilkan keranjang belanja
    echo "<h3>Your Cart:</h3>";
    echo "<ul>";
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>" . $item['product_name'] . " - Rp. " . number_format($item['product_price'], 0, ',', '.') . "</li>";
        $totalPrice += $item['product_price'];
    }
    echo "</ul>";
    echo "<p><strong>Total Price: Rp. " . number_format($totalPrice, 0, ',', '.') . "</strong></p>";

    echo "<p>Your order will be processed and shipped to the provided address.</p>";
    echo "<p><a href='product.php'>Add More Products</a></p>"; // Link kembali ke daftar produk
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout Form</h1>
    <?php if ($selectedProduct): ?>
        <h3>Selected Product: <?= $selectedProduct['name'] ?> - Rp. <?= number_format($selectedProduct['price'], 0, ',', '.') ?></h3>
        <form method="POST" action="">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="payment_method">Payment Method:</label><br>
            <select id="payment_method" name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select><br><br>

            <button type="submit">Add to Cart</button>
        </form>
    <?php else: ?>
        <p>No product selected. <a href="product.php">Go back to product list</a>.</p>
    <?php endif; ?>
</body>
</html>
