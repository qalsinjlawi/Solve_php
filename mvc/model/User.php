<?php
class User {
    public $id;
    public $name;
    public $email;

    // دالة لجلب بيانات المستخدم
    public function getUserData($id) {
        // هنا نتصور أننا جلبنا البيانات من قاعدة بيانات
        return [
            'id' => $id,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];
    }
}
?>
