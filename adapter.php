<?php

# adapter design pattern
# khi project phụ thuộc vào các api, thirt party hoặc các class khác mà có xu hướng thường xuyên thay đổi
# thì ta cần tạo một lớp khác định nghĩa lại phương thức của class đó gọi là adapter, để khi nó có thay đổi thì chỉ cần vào
# adapter thay đổi tên phương thức của nó mà ko bị ảnh hưởng đến toàn project 

class PayPal 
{
    public function sendPayment($amount) 
    {
        echo "Paying via PayPal: ". $amount;
    }
}

interface paymentAdapter 
{
    public function pay($amount);
}
 
class paypalAdapter implements paymentAdapter 
{
  
    public function __construct(private PayPal $paypal) 
    {
    }
  
    public function pay($amount) 
    {
        $this->paypal->sendPayment($amount);
        
    }
}

$paypal = new paypalAdapter(new PayPal());
$paypal->pay('2629');