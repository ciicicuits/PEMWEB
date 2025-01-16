<?php
// Memulai session untuk mengambil data checkout
session_start();

// Cek apakah data pembayaran sudah dikirimkan
if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['payment_method'])) {
    // Simpan data pembayaran dalam session atau lakukan proses lainnya seperti menyimpan ke database
    $_SESSION['customer_name'] = $_POST['name'];
    $_SESSION['customer_address'] = $_POST['address'];
    $_SESSION['payment_method'] = $_POST['payment_method'];
    $_SESSION['product_name'] = $_POST['product_name'];
    $_SESSION['product_price'] = $_POST['product_price'];

    // Menampilkan konfirmasi pembayaran
    echo "<h2>Payment Confirmation</h2>";
    echo "<p>Thank you for your purchase, " . $_SESSION['customer_name'] . "!</p>";
    echo "<p>You have ordered: " . $_SESSION['product_name'] . "</p>";
    echo "<p>Total Price: Rp. " . number_format($_SESSION['product_price'], 0, ',', '.') . "</p>";
    echo "<p>Shipping Address: " . $_SESSION['customer_address'] . "</p>";
    echo "<p>Payment Method: " . $_SESSION['payment_method'] . "</p>";
    echo "<p>Your order will be processed and shipped to the provided address.</p>";

    // Setelah transaksi selesai, Anda dapat mengosongkan session
    // session_unset();
    // session_destroy();
} else {
    echo "Payment information is missing!";
}
?>
