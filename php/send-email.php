<?php

if ($_POST) {

    $to_Email = 'therockyholl@gmail.com'; // Write your email here to receive the form submissions client@leitermos.ru
    $subject = 'Форма с сайта leitermos.ru';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];


    if (empty($name) or empty($phone) or empty($message)) {
        die;
    }

    // Proceed with PHP email
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
    $headers .= 'From: Письмо с сайта <all@webseed.ru>' . "\r\n";
    'X-Mailer: PHP/' . phpversion();

    // Body of the Email received in your Inbox
    $emailcontent = "
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    </head>
    <body style='font-family:Verdana;background:#f2f2f2;color:#606060;'>

        <style>
            h3 {
                font-weight: normal;
                color: #999999;
                margin-bottom: 0;
                font-size: 14px;
            }
            a , h2 {
                color: #6534ff;
            }
            p {
                margin-top: 5px;
                line-height:1.5;
                font-size: 14px;
            }
        </style>

        <table cellpadding='0' width='100%' cellspacing='0' border='0'>
            <tr>
                <td>
                    <table cellpadding='0' cellspacing='0' border='0' align='center' width='100%' style='border-collapse:collapse;'>
                        <tr>
                            <td>

                                <div>
                                    <table cellpadding='0' cellspacing='0' border='0' align='center'  style='width: 100%;max-width:600px;background:#FFFFFF;margin:0 auto;border-radius:5px;padding:50px 30px'>
                                        <tr>
                                            <td width='100%' colspan='3' align='left' style='padding-bottom:0;'>
                                                <div>
                                                    <h2>На сайте была заполнена форма обратной связи</h2>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100%' align='left' style='padding-bottom:30px;'>
                                                <div>
                                                    <p>Информация:</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100%' align='left' style='padding-bottom:20px;'>
                                                <div>
                                                    <h3>От</h3>
                                                    <p>$name</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100%' align='left' style='padding-bottom:20px;'>
                                                <div>
                                                    <h3>Номер телефон</h3>
                                                    <p>$phone</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100%' align='left' style='padding-bottom:20px;'>
                                                <div>
                                                    <h3>Сообщение</h3>
                                                    <p>$message</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div style='margin-top:30px;text-align:center;color:#b3b3b3'>
                                    <p style='font-size:12px;'>2021 <a href='https://leitermos.ru'>leitermos.ru</a></p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>";

    $Mailsending = @mail($to_Email, $subject, $emailcontent, $headers);

    if (!$Mailsending) {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Ошибка сервера отправки",
        ];

        echo json_encode($response);
        die();

    } else {
        $response = [
            "status" => true,
            "type" => 1,
            "message" => "Успешная отправка, мы вам перезвоним!",
        ];

        echo json_encode($response);
        die();
    }

}