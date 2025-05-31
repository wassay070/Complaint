<!DOCTYPE html>
<html>
<head>
    <title>Complaint Status Update</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        
        <!-- Header -->
        <div style="background: #598abf; color: white; padding: 15px; text-align: center; font-size: 20px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            Complaint Status Updated
        </div>

        <h2 style="color: #333; font-size: 20px; margin-top: 20px;">Dear User,</h2>
        <p style="color: #555; font-size: 16px;">Your complaint has been updated with the latest status.</p>

        <h3 style="color: #598abf; margin-top: 20px; font-size: 18px;">Complaint Details:</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Title:</strong> {{ $title }}</li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Category:</strong> {{ $category }}</li>
        </ul>

        <h3 style="color: #598abf; margin-top: 20px; font-size: 18px;">Updated Status:</h3>
        <p style="font-size: 18px; font-weight: bold; color: #ffffff; background: #007bff; display: inline-block; padding: 10px 20px; border-radius: 5px;">
            {{ $status }}
        </p>

        <p style="color: #555; font-size: 16px; margin-top: 20px;">We appreciate your patience and will keep you informed of any further updates.</p>

        <p style="color: #555; font-size: 16px;">Thank you!</p>

        <!-- Footer -->
        <div style="text-align: center; padding: 15px; font-size: 14px; color: #555; border-top: 1px solid #ddd; margin-top: 20px;">
            &copy; {{ date('Y') }} Your Company Name. All Rights Reserved.
        </div>

    </div>

</body>
</html>
