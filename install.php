<?php

$conn = new mysqli("localhost", "root", "");

// فحص الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إنشاء قاعدة البيانات
$conn->query("CREATE DATABASE IF NOT EXISTS cbx_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
$conn->query("USE cbx_db");

// إنشاء جدول المستخدمين
$conn->query("
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255)
)
");

// إنشاء جدول الرسائل
$conn->query("
CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(50),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
");

echo "<h2 style= font-family:Arial >✔ CBX SYSTEM INSTALLED SUCCESSFULLY</h2>";
echo "<p>Database and tables created.</p>";
echo "<a href= index.php >Go to Login</a>";

?>
