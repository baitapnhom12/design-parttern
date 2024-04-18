<?php

# factory design pattern
# nhằm tạo ra một đối tượng động, để gom các đối tượng có cách xử lý giống nhau, có tham số giống nhau 
# không cần biết phương thức của các lớp con thực hiện thế nào, mà chỉ cần yêu cầu đến factory, 
# nó sẽ cung cấp chính xác điều mà chúng ta muốn.

interface Shape {
    const SQUARE = 1;
    const CIRCLE = 2;
    function draw();
}

class Circle implements Shape
{
    public function draw() 
    {
        echo "Draw circle";
    }
}

class Square implements Shape
{
    public function draw() {
        echo "Draw square";
    }
}

class ShapeFactory
{
    public function getShape($type) {
        switch ($type) {
            case Shape::SQUARE:
                return new Square;
                break;
            case Shape::CIRCLE:
                return new Circle;
                break;
            default:
                return null;
                break;
        }
        return null;
    }
}

$factory = new ShapeFactory();
$shapeCircle = $factory->getShape(Shape::SQUARE);
$shapeCircle->draw();