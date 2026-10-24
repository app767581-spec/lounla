<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล (XAMPP ค่าเริ่มต้น: root และไม่มีรหัสผ่าน)
const DB_HOST = '127.0.0.1';
const DB_NAME = 'lounla';
const DB_USER = 'root';
const DB_PASS = '';

// เปลี่ยนเป็นข้อความสุ่มของคุณเอง ใช้ผสมตอนเก็บ IP แบบแฮช
const IP_SALT = 'change-this-to-a-random-text';

function db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER, DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => true,
            ]
        );
        $pdo->exec("SET NAMES utf8mb4");
    }
    return $pdo;
}
