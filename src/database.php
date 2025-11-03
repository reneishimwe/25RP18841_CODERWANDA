<?php
$host = '25RP18841-db';
$dbname = '25RP18841_shareride_db';
$username = 'user';
$password = 'userpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS tbl_users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        user_firstname VARCHAR(50) NOT NULL,
        user_lastname VARCHAR(50) NOT NULL,
        user_gender ENUM('Male', 'Female', 'Other') NOT NULL,
        user_email VARCHAR(100) UNIQUE NOT NULL,
        user_password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>