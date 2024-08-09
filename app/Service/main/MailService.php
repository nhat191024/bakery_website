<?php

namespace App\Service\main;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = config('mail.host');
        $this->mail->SMTPAuth = true;
        $this->mail->Username = config('mail.username');
        $this->mail->Password = config('mail.password');
        $this->mail->SMTPSecure = config('mail.encryption');
        $this->mail->Port = config('mail.port');
        $this->mail->setFrom(config('mail.username'), 'Odouceurs Bakery');
    }

    private function formatPrice($price)
    {
        return number_format($price, 0, ',', '.');
    }

    public function adminSend($to, $name, $orderId, $email, $phone, $address, $payment, $delivery, $createAt, $products, $discount, $total, $accessory)
    {
        try {
            Log::info('Sending mail to admin! address: ' . $to . ', orderId: ' . $orderId);
            $this->mail->addAddress($to);
            $this->mail->AddEmbeddedImage(public_path('img/client/accessory.webp'), 'image_accessory');

            $delivery = $delivery == '1' ? 'Giao hàng tận nơi' : 'Nhận hàng tại cửa hàng';
            $payment = $payment == '2' ? 'Chuyển tiền qua tài khoản' : 'Thanh toán khi nhận hàng';
            $accessory = $accessory ? $accessory : null;
            $createAt = date('d/m/Y', strtotime($createAt));
            $discount = $discount ? $discount : 0;
            $subject = '=?UTF-8?B?' . base64_encode('Thông báo đơn hàng mới #' . $orderId . ' từ Odouceurs Bakery') . '?=';
            if ($accessory == null) {
                $accessoryName = 'Không';
                $accessoryPrice = 0;
            } else {
                $accessoryName = $accessory['name'];
                $accessoryPrice = $accessory['price'];
            }

            $productHtml = '';
            foreach ($products as $product) {
                $this->mail->AddEmbeddedImage(public_path('/img/client/shop/' . $product['product']['image']), 'image_' . $product['product']['id']);
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
                                                ' . $this->formatPrice($variation['price'] * $product['quantity']) . ' VND
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        ';
                    }
                }
            }

            $mailTemplate = '
            <div style="padding: 0 10px; margin-bottom: 25px">
                <div>
                    <p>Thông báo</p>
                    <p>Có đơn hàng mới ở tiệm bánh <strong>Odouceurs</strong>!</p>
                    <p>Đơn hàng <span style="color: rgb(169, 0, 0)">#' . $orderId . '</span> hiện đang được chờ xác nhận.</p>
                </div>
                <hr />
                <div style="padding: 0 10px">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Thông tin mua hàng</th>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Địa chỉ nhận hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-right: 15px">
                                    <table style="width: 100%">
                                        <tbody>
                                            <tr><td>' . $name . '</td></tr>
                                            <tr>
                                                <td style="word-break: break-word; word-wrap: break-word;">
                                                    <a href="mailto:' . $email . '" target="_blank">' . $email . '</a>
                                                </td>
                                            </tr>
                                            <tr><td>' . $phone . '</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table style="width: 100%">
                                        <tbody>
                                            <tr><td>' . $name . '</td></tr>
                                            <tr><td style="word-break: break-word; word-wrap: break-word;">' . $address . '</td></tr>
                                            <tr><td>' . $phone . '</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Phương thức thanh toán</th>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Phương thức vận chuyển</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-right: 15px">' . $payment . '</td>
                                <td>' . $delivery . '<br /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 20px; padding: 0 10px">
                    <div style="padding-top: 10px; font-size: medium">
                        <strong>Thông tin đơn hàng</strong>
                    </div>
                    <table style="width: 100%; margin: 10px 0">
                        <tbody>
                            <tr>
                                <td style="width: 50%; padding-right: 15px">
                                    Mã đơn hàng: #' . $orderId . '
                                </td>
                                <td style="width: 50%">Ngày đặt hàng: ' . $createAt . '</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul style="padding-left: 0; list-style-type: none; margin-bottom: 0">
                        ' . $productHtml . '
                        <li>
                            <table style="width: 100%; border-bottom: 1px solid rgb(228, 233, 235);">
                                <tbody>
                                    <tr>
                                        <td style="width: 100%; padding: 25px 10px 0px 0" colspan="2">
                                            <div style="float: left; width: 80px; height: 80px; border: 1px solid rgb(235, 239, 242); overflow: hidden;">
                                                <img style="max-width: 100%; max-height: 100%;" src="cid:image_accessory" />
                                            </div>
                                            <div style="margin-left: 100px">
                                                <a href="test" style="color: rgb(169, 0, 0); text-decoration: none;" target="_blank" data-saferedirecturl="test">Phụ kiện</a>
                                                <p style="color: rgb(103, 130, 153); margin-bottom: 0px; margin-top: 8px;">' . $accessoryName . '</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 70%; padding: 5px 0px 25px">
                                            <div style="margin-left: 100px">' . $this->formatPrice($accessoryPrice) . ' VND<span style="margin-left: 20px">x 1</span></div>
                                        </td>
                                        <td style="text-align: right; width: 30%; padding: 5px 0px 25px;">' . $this->formatPrice($accessoryPrice) . ' VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 50px; margin-top: 10px;">
                        <tbody>
                            <tr>
                                <td style="width: 20%"></td>
                                <td style="width: 80%">
                                    <table style="width: 100%; float: right">
                                        <tbody>
                                            <tr>
                                                <td style="padding-bottom: 10px">Phụ kiện:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">' . $this->formatPrice($accessoryPrice) . ' VND</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 10px">Giá trừ khuyến mãi:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">' . $this->formatPrice($discount) . ' VND</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 10px">Phí vận chuyển:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">0 VND</td>
                                            </tr>
                                            <tr style="border-top: 1px solid rgb(229, 233, 236);">
                                                <td style="padding-top: 10px">Thành tiền</td>
                                                <td style="font-weight: bold; text-align: right; font-size: 16px; padding-top: 10px;">' . $this->formatPrice($total) . ' VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div style="padding: 0 10px">
                <div style="clear: both"></div>
                <p style="text-align: right"><i>Trân trọng,</i></p>
                <p style="text-align: right">
                    <strong>Hệ thống quản lý tự động tiệm bánh Odouceurs</strong>
                </p>
            </div>
        </div>';

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $mailTemplate;
            $this->mail->send();
            $this->mail->clearAddresses();
            $this->mail->clearAttachments();
            $this->mail->ClearCCs();
            $this->mail->ClearBCCs();
            $this->mail->clearReplyTos();
            $this->mail->Subject = '';
            $this->mail->Body = '';
            Log::info('Successful sent mail to admin! address: ' . $to . ', orderId: ' . $orderId);
        } catch (Exception $e) {
            Log::error('Failed to send mail to admin! address: ' . $to . ', orderId: ' . $orderId);
            Log::error("Mailer Error: {$this->mail->ErrorInfo}");
        }
    }

    public function customerSend($to, $name, $orderId, $email, $phone, $address, $payment, $delivery, $createAt, $products, $discount, $total, $accessory, $QR)
    {
        try {
            Log::info('Sending mail to customer! address: ' . $to . ', orderId: ' . $orderId);
            $this->mail->addAddress($to);
            $this->mail->AddEmbeddedImage(public_path('img/client/accessory.webp'), 'image_accessory');

            $delivery = $delivery == '1' ? 'Giao hàng tận nơi' : 'Nhận hàng tại cửa hàng';
            $payment = $payment == '2' ? 'Chuyển tiền qua tài khoản' : 'Thanh toán khi nhận hàng';
            $accessory = $accessory ? $accessory : null;
            $createAt = date('d/m/Y', strtotime($createAt));
            $discount = $discount ? $discount : 0;
            $subject = '=?UTF-8?B?' . base64_encode('Xác nhận đơn hàng #' . $orderId . ' thành công từ Odouceurs Bakery') . '?=';
            if ($accessory == null) {
                $accessoryName = 'Không';
                $accessoryPrice = 0;
            } else {
                $accessoryName = $accessory['name'];
                $accessoryPrice = $accessory['price'];
            }

            $productHtml = '';
            foreach ($products as $product) {
                $this->mail->AddEmbeddedImage(public_path('/img/client/shop/' . $product['product']['image']), 'image_' . $product['product']['id']);
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
                                                ' . $this->formatPrice($variation['price'] * $product['quantity']) . ' VND
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        ';
                    }
                }
            }

            $mailTemplate = '
            <div style="padding: 0 10px; margin-bottom: 25px">
                <div>
                    <p>Xin chào ' . $name . '</p>
                    <p>Cảm ơn Anh/chị đã đặt hàng tại tiệm bánh <strong>Odouceurs</strong>!</p>
                    <p>Đơn hàng <span style="color: rgb(169, 0, 0)">#' . $orderId . '</span> của anh/chị đã được xác nhận, chúng tôi sẽ liên hệ với anh/chị trong thời gian sớm nhất.</p>
                    <p><strong>Đây là hệ thống tự động vui lòng không trả lời mail này</strong></p>
                </div>
                <hr />
                <div style="padding: 0 10px">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Thông tin mua hàng</th>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Địa chỉ nhận hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-right: 15px">
                                    <table style="width: 100%">
                                        <tbody>
                                            <tr><td>' . $name . '</td></tr>
                                            <tr>
                                                <td style="word-break: break-word; word-wrap: break-word;">
                                                    <a href="mailto:' . $email . '" target="_blank">' . $email . '</a>
                                                </td>
                                            </tr>
                                            <tr><td>' . $phone . '</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table style="width: 100%">
                                        <tbody>
                                            <tr><td>' . $name . '</td></tr>
                                            <tr><td style="word-break: break-word; word-wrap: break-word;">' . $address . '</td></tr>
                                            <tr><td>' . $phone . '</td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Phương thức thanh toán</th>
                                <th style="text-align: left; width: 50%; font-size: medium; padding: 5px 0;">Phương thức vận chuyển</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-right: 15px">' . $payment . '</td>
                                <td>' . $delivery . '<br /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 20px; padding: 0 10px">
                    <div style="padding-top: 10px; font-size: medium">
                        <strong>Thông tin đơn hàng</strong>
                    </div>
                    <table style="width: 100%; margin: 10px 0">
                        <tbody>
                            <tr>
                                <td style="width: 50%; padding-right: 15px">
                                    Mã đơn hàng: #' . $orderId . '
                                </td>
                                <td style="width: 50%">Ngày đặt hàng: ' . $createAt . '</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul style="padding-left: 0; list-style-type: none; margin-bottom: 0">
                        ' . $productHtml . '
                        <li>
                            <table style="width: 100%; border-bottom: 1px solid rgb(228, 233, 235);">
                                <tbody>
                                    <tr>
                                        <td style="width: 100%; padding: 25px 10px 0px 0" colspan="2">
                                            <div style="float: left; width: 80px; height: 80px; border: 1px solid rgb(235, 239, 242); overflow: hidden;">
                                                <img style="max-width: 100%; max-height: 100%;" src="cid:image_accessory" />
                                            </div>
                                            <div style="margin-left: 100px">
                                                <a href="test" style="color: rgb(169, 0, 0); text-decoration: none;" target="_blank" data-saferedirecturl="test">Phụ kiện</a>
                                                <p style="color: rgb(103, 130, 153); margin-bottom: 0px; margin-top: 8px;">' . $accessoryName . '</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 70%; padding: 5px 0px 25px">
                                            <div style="margin-left: 100px">' . $this->formatPrice($accessoryPrice) . ' VND<span style="margin-left: 20px">x 1</span></div>
                                        </td>
                                        <td style="text-align: right; width: 30%; padding: 5px 0px 25px;">' . $this->formatPrice($accessoryPrice) . ' VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 50px; margin-top: 10px;">
                        <tbody>
                            <tr>
                                <td style="width: 20%"></td>
                                <td style="width: 80%">
                                    <table style="width: 100%; float: right">
                                        <tbody>
                                            <tr>
                                                <td style="padding-bottom: 10px">Phụ kiện:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">' . $this->formatPrice($accessoryPrice) . ' VND</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 10px">Giá trừ khuyến mãi:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">' . $this->formatPrice($discount) . ' VND</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 10px">Phí vận chuyển:</td>
                                                <td style="font-weight: bold; text-align: right; padding-bottom: 10px;">0 VND</td>
                                            </tr>
                                            <tr style="border-top: 1px solid rgb(229, 233, 236);">
                                                <td style="padding-top: 10px">Thành tiền</td>
                                                <td style="font-weight: bold; text-align: right; font-size: 16px; padding-top: 10px;">' . $this->formatPrice($total) . ' VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding: 0 10px; margin-bottom: 25px; display: flex; flex-direction: column; align-items: center;">
                    <p>QR thanh toán - nếu như đã thanh toán vui lòng bỏ qua</p>
                    <img src="https://api.vietqr.io/image/970436-0941000019966-w4UqEbj.jpg' . $QR . '" alt="" width="30%">
                </div>
                <div style="padding: 0 10px">
                    <div style="clear: both"></div>
                    <p style="margin: 30px 0">
                        Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại
                        <a href="odouceurs@gmail.com" style="color: rgb(169, 0, 0)" target="_blank">odouceurs@gmail.com</a>
                    </p>
                    <p style="text-align: right"><i>Trân trọng,</i></p>
                    <p style="text-align: right"><strong>Hệ thống tự động quản trị tiệm bánh Odouceurs</strong></p>
                </div>
            </div>';

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $mailTemplate;
            $this->mail->send();
            $this->mail->clearAddresses();
            $this->mail->clearAttachments();
            $this->mail->ClearCCs();
            $this->mail->ClearBCCs();
            $this->mail->clearReplyTos();
            $this->mail->Subject = '';
            $this->mail->Body = '';
            Log::info('Successful sent mail to customer! address: ' . $to . ', orderId: ' . $orderId);
        } catch (Exception $e) {
            Log::error('Failed to send mail to customer! address: ' . $to . ', orderId: ' . $orderId);
            Log::error("Mailer Error: {$this->mail->ErrorInfo}");
        }
    }
}
