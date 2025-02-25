<?php
// استدعاء الـ Controller الذي يحتوي على المنطق
require_once 'controller/UserController.php';

// إنشاء كائن من الـ UserController
$controller = new UserController();

// عرض بيانات المستخدم بالـ ID 1
$controller->showUser(1);
?>
