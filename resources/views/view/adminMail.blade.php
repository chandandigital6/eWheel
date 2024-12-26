<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta http-equiv="X-UA-Compatible" content="IE=edge;">
    <title>New Lead Created</title>
    <style type="text/css">
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
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
        }
        .email-header h2 {
            margin: 0;
            font-size: 24px;
            color: #4CAF50;
        }
        .email-body {
            padding: 20px 0;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .email-body ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }
        .email-body ul li {
            font-size: 16px;
            margin: 5px 0;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .email-body strong {
            color: #333333;
        }
        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
            font-size: 12px;
            color: #888888;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }
            .email-header h2 {
                font-size: 20px;
            }
            .email-body p,
            .email-body ul li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header -->
    <div class="email-header">
        <h2>New Lead Created</h2>
    </div>

    <!-- Body -->
    <div class="email-body">
        <p><strong>Lead Details:</strong></p>
        <ul>
            <li><strong>Name:</strong> {{ $appointment->name }}</li>
            <li><strong>Email:</strong> {{ $appointment->email }}</li>
            <li><strong>Phone Number:</strong> {{ $appointment->number }}</li>
            <li><strong>Msg:</strong> {{ $appointment->msg }}</li>
        </ul>
        <p style="color: #555555;">Please review the above details. If any information is incorrect, contact us immediately.</p>
    </div>

    <!-- Footer -->
    <div class="email-footer">
        <p>This is an automated notification. Please do not reply to this email.</p>
        <p>&copy; {{ date('Y') }} https://lithopowerr.com. All rights reserved.</p>
    </div>
</div>
</body>
</html>
