<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>

<body>
    <h1>Dear {{ $user->name }} </h1>

    <div>
        <p>We are truly grateful for your interest in our product updates. Your subscription has been confirmed, and you
            will now be among the first to hear about our latest features and promotions.
        </p>

        <p>Our team is dedicated to providing you with valuable information that can enhance your experience with our
            products. If you have any questions, please do not hesitate to get in touch with us.
        </p>

        <p>Thank you once again for joining our community. We look forward to bringing you exciting news and updates.
        </p>
    </div>

    <p>Best regards,</p>
    <p><em>{{ env('APP_NAME') }}</em></p>

</body>

</html>
