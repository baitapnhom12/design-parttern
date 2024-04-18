<?php

# singleton design pattern
# đảm bảo việc khởi tạo đối tượng chỉ diễn ra một lần trong suốt quá trình chạy ứng dụng.
# ngăn chặn việc tạo một object thông qua từ khoá new 

class DatabaseManager {
    private static $singletonObj = null;

    private function __construct() {
    }

    public static function createSingletonObject() {
        if (self::$singletonObj !== null) {
            return self::$singletonObj;
        }

        self::$singletonObj = new self();
        return self::$singletonObj;
    }
}

$con1 = DatabaseManager::createSingletonObject();
$con2 = DatabaseManager::createSingletonObject();

var_dump($con1 === $con2); # return true 