<?php //echo "<pre>"; print_r($mail_data); exit;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
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
        
        <p>Dear <?php echo $mail_data['customer_name'];?>,</p>
        <p>Thank you for booking with Cricademia! Here are the details of your event registration.</p>
       
        <div class="order-details">
            <p>- Event Name: <?php echo $mail_data['event_name'];?>  </p>
            <p>- Date: <?php echo $mail_data['event_date'];?> </p>
            <p>- Place: <?php echo $mail_data['event_place'];?> </p>
            <p>- Price: <?php echo $mail_data['event_price'];?> </p>

        </div>
        <div class="order-details">
            <h3>Athlete Details:</h3>
            <p>- Name: <?php echo $mail_data['customer_name'];?> </p>
            <p>- Age: <?php echo $mail_data['age'];?> </p>
            <p>- Email: <?php echo $mail_data['email'];?> </p>
            <p>- Medical Conditions/Allergies: <?php echo $mail_data['medical_condition'];?> </p>
            <p>- Emergency Contact Name: <?php echo $mail_data['emergency_contact_name'];?> </p>
            <p>- Emergency Contact Number: <?php echo $mail_data['emergency_contact_number'];?> </p>

        </div>
        
        <p>We are excited to have you join us for the event!</p>
        <p>Please Note: To capture the fun and talent of our cricket courses, we may take photos and videos of the children participating. By enrolling your child, you consent to their images being used on our social media platforms. If you do not consent to these images being used, please email us at info@cricademia.com.</p>
        <div class="footer">
            <p>Best regards,</p>
            <p><?php echo $mail_data['site_name'];?> Support Team<br></p>
        </div>
    </div>
</body>
</html>