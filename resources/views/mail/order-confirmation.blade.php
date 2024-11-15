<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Processed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        .order-details {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .order-details h2 {
            margin-top: 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Booking Refund Request Received #{{$order_id}}</h1>
        <p>Dear {{$customer_name}},</p>
        <p>We have received your request for an event booking refund. Our admin team is reviewing your request and will process it shortly.</p>
        <p>You will be notified once the refund has been processed. Please allow up to [Timeframe] for the completion..</p>
        <div class="order-details">
            
        </div>
        
        <p>Thank you for your understanding.</p>
        <div class="footer">
            <p>Best regards,</p>
            <p>{{$site_name}} Support Team<br></p>
        </div>
    </div>
</body>
</html>