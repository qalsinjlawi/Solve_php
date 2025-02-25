<?php
// تعريف الفئة الأب (Parent Class)
class Animal {
    public $name; // خاصية لتخزين اسم الحيوان

    // المُنشئ (Constructor) لتعيين اسم الحيوان عند إنشاء الكائن
    public function __construct($name) {
        $this->name = $name;
    }

   
    public function makeSound() {
        echo "This animal makes a sound.<br>"; 
    }
}

// تعريف الفئة الابن (Child Class) التي ترث من Animal
class Dog extends Animal {
   
    public function makeSound() {
        echo "The dog's name is: $this->name 🐶<br>"; 
    }
}

// $dog1 = new Dog("Boche");
// $dog2 = new Dog("Max");
// $dog3 = new Dog("Buddy");

// // استدعاء الدالة makeSound() لكل كلب
// $dog1->makeSound();
// $dog2->makeSound();
// $dog3->makeSound();








$dogNames = ["Buddy", "Max", "Charlie", "Rex"];

// استخدام حلقة for لإنشاء كائنات الكلاب واستدعاء makeSound()
for ($i = 0; $i < count($dogNames); $i++) {
    $dog = new Dog($dogNames[$i]);  // إنشاء كائن جديد لكل اسم في المصفوفة
    $dog->makeSound();  // استدعاء دالة makeSound()
}
?>
