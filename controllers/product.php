<?php
include_once __DIR__ . '/../config/db.php';

function get_all_products() {
    global $conn;
    return $conn->query("SELECT * FROM products");
}

function get_product($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function add_product($name, $price, $stock) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO products(name, price, stock) VALUES(?, ?, ?)");
    $stmt->bind_param("sdi", $name, $price, $stock);
    return $stmt->execute();
}

function update_product($id, $name, $price, $stock) {
    global $conn;
    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, stock=? WHERE id=?");
    $stmt->bind_param("sdii", $name, $price, $stock, $id);
    return $stmt->execute();
}

function delete_product($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
