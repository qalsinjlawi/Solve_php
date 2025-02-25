<?php
require_once 'model/User.php';

class UserController {
    // دالة لعرض بيانات المستخدم بناءً على الـ ID
    public function showUser($id) {
        $user = new User();
        $userData = $user->getUserData($id);
        
        // إرسال البيانات إلى الـ View لعرضها
        require 'view/user_view.php';
    }
}
?>
