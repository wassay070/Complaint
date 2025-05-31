<!DOCTYPE html>
<html>
<head>
    <title>Complaint Submitted</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    
    <div style="margin-top: 20px; margin-bottom: 20px; marg max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        
        <!-- Header -->
        <div style="background: #598abf; color: white; padding: 15px; text-align: center; font-size: 20px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            Complaint Submitted Successfully
        </div>

        <h2 style="color: #333; font-size: 18px; margin-top: 20px;">Dear <?php echo e(auth()->user()->name); ?>,</h2>
        <p style="color: #555; font-size: 16px;">Your complaint has been successfully submitted to the concerned authority.</p>

        <h3 style="color: #598abf; font-size: 16px; margin-top: 20px;">Complaint Details:</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Title:</strong> <?php echo e($title); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Category:</strong> <?php echo e($category); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Urgency:</strong> <?php echo e($urgency); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Description:</strong> <?php echo e($description); ?></li>
        </ul>

        <p style="color: #555; font-size: 16px;">We will update you once further action is taken.</p>

        <p style="color: #555; font-size: 16px;">Thank you for reaching out!</p>

         <!-- Footer -->
         <div style="text-align: center; padding: 15px; font-size: 14px; color: #555; border-top: 1px solid #ddd; margin-top: 20px;">
            &copy; <?php echo e(date('Y')); ?> Your Company Name. All Rights Reserved.
        </div>

    </div>

</body>
</html>
<?php /**PATH D:\Projects\complain\resources\views/emails/complaint_submitted.blade.php ENDPATH**/ ?>