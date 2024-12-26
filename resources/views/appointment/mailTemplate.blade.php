<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta http-equiv="X-UA-Compatible" content="IE=edge;">
    <title>  Confirmation Email</title>
    <style type="text/css">
        /* General Styles */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
        }
        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        /* Container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        /* Header */
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }
        /* Body */
        .email-body {
            padding: 20px 0;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .email-body ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }
        .email-body li {
            font-size: 16px;
            margin: 5px 0;
        }
        .email-body strong {
            color: #000000;
        }
        /* Footer */
        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #888888;
        }
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }
            .email-header h1 {
                font-size: 20px;
            }
            .email-body p,
            .email-body li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header -->
    <div class="email-header">
        <h1>Appointment Confirmation</h1>
    </div>

    <!-- Body -->
    <div class="email-body">
        <p>Dear {{ $appointment->name }},</p>

        <p>We are pleased to confirm your appointment with us. Here are the details:</p>

        <ul>
            <li><strong>Name:</strong> {{ $appointment->name }}</li>
            <li><strong>Email:</strong> {{ $appointment->email }}</li>
            <li><strong>Phone Number:</strong> {{ $appointment->number }}</li>
            <li><strong>Msg:</strong> {{ $appointment->msg }}</li>

        </ul>

        <p>If you have any questions or need to reschedule, please feel free to contact us at +918423269465.</p>

        <p>Thank you,<br>
            https://lithopowerr.com/</p>
    </div>

    <!-- Footer -->
    <div class="email-footer">
        <p>This is an automated notification. Please do not reply to this email.</p>
        <p>&copy; {{ date('Y') }}  lithopowerr.com. All rights reserved.</p>
    </div>
</div>
</body>
</html>
