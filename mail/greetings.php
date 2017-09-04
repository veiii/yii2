<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>[SUBJECT]</title>
        <style type="text/css">
            body {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                -webkit-text-size-adjust: 100% !important;
                -ms-text-size-adjust: 100% !important;
                -webkit-font-smoothing: antialiased !important;
            }

            .tableContent img {
                border: 0 !important;
                display: block !important;
                outline: none !important;
            }

            a {
                color: #382F2E;
            }

            p, h1, h2, ul, ol, li, div {
                margin: 0;
                padding: 0;
            }

            h1, h2 {
                font-weight: normal;
                background: transparent !important;
                border: none !important;
            }

            @media only screen and (max-width: 480px) {

                table[class="MainContainer"], td[class="cell"] {
                    width: 100% !important;
                    height: auto !important;
                }

                td[class="specbundle"] {
                    width: 100% !important;
                    float: left !important;
                    font-size: 13px !important;
                    line-height: 17px !important;
                    display: block !important;
                    padding-bottom: 15px !important;
                }

                td[class="specbundle2"] {
                    width: 80% !important;
                    float: left !important;
                    font-size: 13px !important;
                    line-height: 17px !important;
                    display: block !important;
                    padding-bottom: 10px !important;
                    padding-left: 10% !important;
                    padding-right: 10% !important;
                }

                td[class="spechide"] {
                    display: none !important;
                }

                img[class="banner"] {
                    width: 100% !important;
                    height: auto !important;
                }

                td[class="left_pad"] {
                    padding-left: 15px !important;
                    padding-right: 15px !important;
                }

            }

            @media only screen and (max-width: 540px) {

                table[class="MainContainer"], td[class="cell"] {
                    width: 100% !important;
                    height: auto !important;
                }

                td[class="specbundle"] {
                    width: 100% !important;
                    float: left !important;
                    font-size: 13px !important;
                    line-height: 17px !important;
                    display: block !important;
                    padding-bottom: 15px !important;
                }

                td[class="specbundle2"] {
                    width: 80% !important;
                    float: left !important;
                    font-size: 13px !important;
                    line-height: 17px !important;
                    display: block !important;
                    padding-bottom: 10px !important;
                    padding-left: 10% !important;
                    padding-right: 10% !important;
                }

                td[class="spechide"] {
                    display: none !important;
                }

                img[class="banner"] {
                    width: 100% !important;
                    height: auto !important;
                }

                td[class="left_pad"] {
                    padding-left: 15px !important;
                    padding-right: 15px !important;
                }

            }

            .contentEditable h2.big, .contentEditable h1.big {
                font-size: 26px !important;
            }

            .contentEditable h2.bigger, .contentEditable h1.bigger {
                font-size: 37px !important;
            }

            td, table {
                vertical-align: top;
            }

            td.middle {
                vertical-align: middle;
            }

            a.link1 {
                font-size: 13px;
                color: #27A1E5;
                line-height: 24px;
                text-decoration: none;
            }

            a {
                text-decoration: none;
            }

            h2, h1 {
                line-height: 20px;
            }

            p {
                font-size: 14px;
                line-height: 21px;
                color: #AAAAAA;
            }

            .contentEditable li {

            }

            .appart p {

            }

            img {
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
                width: auto;
                max-width: 100%;
                clear: both;
                display: block;
                float: none;
            }

        </style>


        <script type="colorScheme" class="swatch active">
{
    "name":"Default",
    "bgBody":"ffffff",
    "link":"27A1E5",
    "color":"AAAAAA",
    "bgItem":"ffffff",
    "title":"444444"
}



        </script>


        <?php $this->head() ?>
    </head>
    <body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4"
          style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;"
          offset="0" toppadding="0" leftpadding="0">
    <?php $this->beginBody() ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff"
                       style="font-family:helvetica, sans-serif;" class="MainContainer">
                    <!-- =============== START HEADER =============== -->
                    <tbody>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="top" width="20">&nbsp;</td>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td class="movableContentContainer">
                                                    <div class="movableContent"
                                                         style="border: 0px; padding-top: 0px; position: relative;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td height="15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0"
                                                                           cellpadding="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td valign="top">
                                                                                <table width="100%" border="0"
                                                                                       cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        </td>
                                                                                        <td valign="middle"
                                                                                            style='vertical-align: middle;'>
                                                                                            <div class='contentEditableContainer contentTextEditable'>
                                                                                                <div class='contentEditable'
                                                                                                     style='text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;'>
                                                                                                    <h1 class='big'><a
                                                                                                                target='_blank'
                                                                                                                href="http://localhost/basic/web/index.php"
                                                                                                                style='color:#444444'>Official
                                                                                                            site</a>
                                                                                                    </h1>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>

                                                                                <!-- =============== END HEADER =============== -->
                                                                                <!-- =============== START BODY =============== -->
                                                                                <div class="movableContent"
                                                                                     style="border: 0px; padding-top: 0px; position: relative;">
                                                                                    <table width="100%" border="0"
                                                                                           cellspacing="0"
                                                                                           cellpadding="0">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td height='40'></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px">
                                                                                                <table width="100%"
                                                                                                       border="0"
                                                                                                       cellspacing="0"
                                                                                                       cellpadding="0">
                                                                                                    <tbody>
                                                                                                    <tr>
                                                                                                        <td valign="top"
                                                                                                            width="40">
                                                                                                            &nbsp;
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <table width="100%"
                                                                                                                   border="0"
                                                                                                                   cellspacing="0"
                                                                                                                   cellpadding="0"
                                                                                                                   align="center">
                                                                                                                <tr>
                                                                                                                    <td height='25'></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <div class='contentEditableContainer contentTextEditable'>
                                                                                                                            <div class='contentEditable'
                                                                                                                                 style='text-align: center;'>
                                                                                                                                <h2 style="font-size: 20px;">
                                                                                                                                    Welcome</h2>
                                                                                                                                <br>
                                                                                                                                <p>
                                                                                                                                    Thanks
                                                                                                                                    you
                                                                                                                                    for
                                                                                                                                    registration
                                                                                                                                    in
                                                                                                                                    our
                                                                                                                                    study
                                                                                                                                    system.
                                                                                                                                    <a href="http://localhost/basic/web/index.php">Log
                                                                                                                                        in</a>
                                                                                                                                    and
                                                                                                                                    choose
                                                                                                                                    your
                                                                                                                                    future.
                                                                                                                                    <br>

                                                                                                                                </p>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td height='24'></td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                        <td valign="top"
                                                                                                            width="40">
                                                                                                            &nbsp;
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <!-- =============== END BODY =============== -->
                                                                                    <!-- =============== START FOOTER =============== -->

                                                                                    <div class="movableContent"
                                                                                         style="border: 0px; padding-top: 0px; position: relative;">
                                                                                        <table width="100%" border="0"
                                                                                               cellspacing="0"
                                                                                               cellpadding="0">
                                                                                            <tbody>
                                                                                            <tr>
                                                                                                <td height="48"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <table width="100%"
                                                                                                           border="0"
                                                                                                           cellspacing="0"
                                                                                                           cellpadding="0">
                                                                                                        <tbody>
                                                                                                        <tr>
                                                                                                            <td valign="top"
                                                                                                                width="90"
                                                                                                                class="spechide">
                                                                                                                &nbsp;
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <table width="100%"
                                                                                                                       cellpadding="0"
                                                                                                                       cellspacing="0"
                                                                                                                       align="center">
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                            <div class='contentEditableContainer contentTextEditable'>
                                                                                                                                <div class='contentEditable'
                                                                                                                                     style='text-align: center;color:#AAAAAA;'>
                                                                                                                                    <p>
                                                                                                                                        Sent
                                                                                                                                        by
                                                                                                                                        University
                                                                                                                                        <br/>
                                                                                                                                    </p>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </td>
                                                                                                            <td valign="top"
                                                                                                                width="90"
                                                                                                                class="spechide">
                                                                                                                &nbsp;
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>


                                                                                        <?php $this->endBody() ?>

                                                                                    </div>

                                                                                    <!-- =============== END FOOTER =============== -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td valign="top" width="20">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


    </body>
    </html>
<?php $this->endPage() ?>