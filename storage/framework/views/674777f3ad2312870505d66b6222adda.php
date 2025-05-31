<!DOCTYPE html>
<html>
<head>
    <title>Complaint Assigned</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        
        <!-- Header -->
        <div style="background: #598abf; color: white; padding: 15px; text-align: center; font-size: 20px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            Complaint Assigned to Resolver
        </div>

        <h2 style="color: #333; font-size: 20px; margin-top: 20px;">Dear User,</h2>
        <p style="color: #555; font-size: 16px;">Your complaint has been assigned to a resolver.</p>

        <h3 style="color: #598abf; margin-top: 20px; font-size: 18px;">Complaint Details:</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Title:</strong> <?php echo e($title); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Category:</strong> <?php echo e($category); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Urgency:</strong> <?php echo e($urgency); ?></li>
            <li style="padding: 8px 0; border-bottom: 1px solid #ddd;"><strong style="color: #598abf;">Description:</strong> <?php echo e($description); ?></li>
        </ul>

        <h3 style="color: #598abf; margin-top: 20px; font-size: 18px;">Assigned Complaint Handler:</h3>
        <p style="color: #555; font-size: 16px;">
            <strong>Name:</strong> <?php echo e($resolverName); ?> <br>
            <strong>Email:</strong> <?php echo e($resolverEmail); ?>

        </p>

        <p style="color: #555; font-size: 16px;">You will be updated once further action is taken.</p>

        <p style="color: #555; font-size: 16px;">Thank you!</p>

        <!-- Footer -->
        <div style="text-align: center; padding: 15px; font-size: 14px; color: #555; border-top: 1px solid #ddd; margin-top: 20px;">
            &copy; <?php echo e(date('Y')); ?> Your Company Name. All Rights Reserved.
        </div>

    </div>

</body>
</html>
<?php /**PATH D:\Projects\complain\resources\views/emails/assign_resolver.blade.php ENDPATH**/ ?>