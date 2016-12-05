<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$subject}}</title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
    <style>
        body {
            margin: 0 !important;
            padding: 0;
            background-color: #ffffff;
        }
        table {
            border-spacing: 0;
            font-family: sans-serif;
            color: #333333;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .webkit {
            max-width: 600px;
            margin: 0 auto;
        }
        .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
        }
        .full-width-image img {
            width: 100%;
            max-width: 600px;
            height: auto;
        }
        .inner {
            padding: 10px;
        }
        p {
            Margin: 0;
        }
        a {
            color: #ee6a56;
            text-decoration: underline;
        }
        .h1 {
            font-size: 21px;
            font-weight: bold;
            Margin-bottom: 18px;
        }
        .h2 {
            font-size: 18px;
            font-weight: bold;
            Margin-bottom: 12px;
        }

        /* One column layout */
        .one-column .contents {
            text-align: left;
        }
        .one-column p {
            font-size: 14px;
            Margin-bottom: 10px;
        }
        /*Two column layout*/
        .two-column {
            text-align: center;
            font-size: 0;
        }
        .two-column .column {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        .contents {
            width: 100%;
        }
        .two-column .contents {
            font-size: 14px;
            text-align: left;
        }
        .two-column img {
            width: 100%;
            max-width: 280px;
            height: auto;
        }
        .two-column .text {
            padding-top: 10px;
        }
        /*Three column layout*/
        .three-column {
            text-align: center;
            font-size: 0;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .three-column .column {
            width: 100%;
            max-width: 200px;
            display: inline-block;
            vertical-align: top;
        }
        .three-column .contents {
            font-size: 14px;
            text-align: center;
        }
        .three-column img {
            width: 100%;
            max-width: 180px;
            height: auto;
        }
        .three-column .text {
            padding-top: 10px;
        }
    </style>
</head>
<body>
<center class="wrapper">
    <div class="webkit">
        <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center">
            <tr>
                <td>
        <![endif]-->
        <table class="outer" align="center">
            <tr>
                <td>
                    <table class="outer" align="center">
                        <tr>
                            <td class="full-width-image">
                                <img src="{{url('imgs/mailerTop.png')}}" width="600" alt="" />
                            </td>
                        </tr>
                    </table>                </td>
            </tr>

            <!-- one column layout starts here -->

            <tr>
                <td class="one-column">
                    <table width="100%">
                        <tr>
                            <td class="inner contents">
                                <p class="h1">Hi, {{$name}}!</p>
                                <p>Your Password Has been successfully reset</p>
                                <p>Your New Password is <strong>{{$text}}</strong></p>
                                <p><a href="{{url('/')}}">Click Here to login</a></p>
                                <p>Please endavor to change your password immediately you login.<br></p>
                                <p>Regards,<br>MDAdebts APTOVP</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- one column layout ends here -->

            <tr>
                <td>
                    <table class="outer" align="center">
                        <tr>
                            <td class="full-width-image">
                                <img src="{{url('imgs/mailerBottom.png')}}" width="600" alt="" />
                            </td>
                        </tr>
                    </table>                </td>
            </tr>



        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->    </div>
</center>
</body>
</html>