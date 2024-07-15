<?php

namespace App\Service\main;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private function formatPrice($price)
    {
        return number_format($price, 0, ',', '.');
    }

    public function customerSend($to, $name, $orderId, $email, $phone, $address, $payment, $delivery, $createAt, $products, $discount, $total, $accessory)
    {

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = config('mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.username');
            $mail->Password = config('mail.password');
            $mail->SMTPSecure = config('mail.encryption');
            $mail->Port = config('mail.port');
            $mail->setFrom(config('mail.username'), 'Odouceurs Bakery');
            $mail->addAddress($to);

            $mail->AddEmbeddedImage(public_path('img\client\accessory.webp'), 'image_accessory');

            $delivery = $delivery == '1' ? 'Giao hàng tận nơi' : 'Nhận hàng tại cửa hàng';
            $payment = $payment == '1' ? 'Chuyển tiền qua tài khoản' : 'Thanh toán khi nhận hàng';
            $accessory = $accessory ? $accessory : null;
            $createAt = date('d/m/Y', strtotime($createAt));
            $discount = $discount ? $discount : 0;

            $path = resource_path('views/emailTemplate.html');
            $message = file_get_contents($path);
            $subject = '=?UTF-8?B?' . base64_encode('Xác nhận đơn hàng #' . $orderId . ' thành công từ Odouceurs Bakery') . '?=';

            $message = str_replace('{{ name }}', $name, $message);
            $message = str_replace('{{ orderId }}', $orderId, $message);
            $message = str_replace('{{ mail }}', $email, $message);
            $message = str_replace('{{ phone }}', $phone, $message);
            $message = str_replace('{{ address }}', $address, $message);
            $message = str_replace('{{ payment }}', $payment, $message);
            $message = str_replace('{{ delivery }}', $delivery, $message);
            $message = str_replace('{{ createAt }}', $createAt, $message);
            if ($accessory == null) {
                $message = str_replace('{{ accessoryName }}', "Không", $message);
                $message = str_replace('{{ accessoryPrice }}', 0, $message);
            } else {
                $message = str_replace('{{ accessoryName }}', $accessory['name'], $message);
                $message = str_replace('{{ accessoryPrice }}', $this->formatPrice($accessory['price']), $message);
            }
            $productHtml = '';
            foreach ($products as $product) {

                $mail->AddEmbeddedImage(public_path('/img/client/shop/' . $product['product']['image']), 'image_' . $product['product']['id']);
                foreach ($product['product']['product_variations'] as $variation) {
                    if ($product['variation_id'] == $variation['variation_id']) {
                        $productHtml .= '
                            <li>
                                <table style="width: 100%; border-bottom: 1px solid rgb(228, 233, 235);">
                                    <tbody>
                                        <tr>
                                            <td style="width: 100%; padding: 25px 10px 0px 0" colspan="2">
                                                <div style="float: left; width: 80px; height: 80px; border: 1px solid rgb(235, 239, 242); overflow: hidden; ">
                                                    <img style=" max-width: 100%; max-height: 100%;" src="' . 'cid:image_' . $product['product']['id'] . '" />
                                                </div>
                                                <div style="margin-left: 100px">
                                                    <a href="" style="color: rgb(169, 0, 0); text-decoration: none;" target="_blank" data-saferedirecturl="test">
                                                        ' . $product['product']['name'] . '</a>
                                                    <p style="color: rgb(103, 130, 153); margin-bottom: 0px; margin-top: 8px;">
                                                        ' . $product['product']['name'] . '
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 70%; padding: 5px 0px 25px">
                                                <div style="margin-left: 100px">
                                                    ' . $this->formatPrice($variation['price']) . ' VND
                                                    <span style="margin-left: 20px">x' . $product['quantity'] . '</span>
                                                </div>
                                            </td>
                                            <td style="text-align: right; width: 30%; padding: 5px 0px 25px;">
                                                '. $this->formatPrice($variation['price'] * $product['quantity']) .' VND
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        ';
                    }
                }
            }
            $message = str_replace('{{ products }}', $productHtml, $message);
            $message = str_replace('{{ discount }}', $this->formatPrice($discount), $message);
            $message = str_replace('{{ total }}', $this->formatPrice($total), $message);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
