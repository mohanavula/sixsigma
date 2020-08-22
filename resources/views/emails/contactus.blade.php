<!DOCTYPE html>
<html>
<head>
    <title>Message from {{ $email['reply_to'] }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: #d9dcdf;
            color: #1A202C;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            max-width: 512px;
            width: 80%;
            vertical-align: bottom;
            background-color: whitesmoke;
        }

        .container { 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            margin-left: auto;
            margin-right: auto;
            margin-top: 16px;
        }

        tr, td {
            height: 40px;
            padding: 12px;
        }

        .title {
            color: #ECC94B;
            background-color: #1A202C;
            text-align: center;
            text-decoration: none;
            padding: 0.25rem;
            font-size: 1.5rem;
            font-weight: lighter;
            border-radius: 3px 3px 0px 0px;
        }
        .content {
            padding: 1rem;
        }

        .footer {
            background-color: #ECC94B;
            color: #1A202C;
            letter-spacing: 0.05em;
            text-align: center;
            padding: 0.75rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <table class="container">
        <tr>
            <td class="title">sixSigma</td>
        </tr>
        <tr class="content">
            <td>
                <span style="padding-bottom: 5px">Hi</span><br>
                <span> {{$email['name']}} wants to contact you regarding the the subject:  strength of materials</span><br>
            </td>
        </tr>

        <tr class="content">
            <td>
                <span>Message description: {{ 'Topic description:' . $email['topic_description']}}</span>
            </td>
        </tr>
        <tr class="content">
            <td>
                <span>Message description: {{ $email['body']}}</span>
            </td>
        </tr>
        <tr class="content">
            <td>
                Please reply to this email to: {{ 'Reply to:' . $email['reply_to']}}
            </td>
        </tr>
        <tr class="footer">
            <td>
                <span>Center for Research and Innovation</span><br>
                <span>KSRM College of Engineering, Kadapa</span>
            </td>
        </tr>
    </table>
</body>
</html>