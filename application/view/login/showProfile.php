<div class="container">
    <h1>LoginController/showProfile</h1>

    <div class="box">
        <h2>Your profile</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <div>Your username: <?php echo $this->user_name; ?></div>
        <div>Your email: <?php echo $this->user_email; ?></div>
        <div>Your avatar image:
            <?php if (Config::get('USE_GRAVATAR')) { ?>
                Your gravatar pic (on gravatar.com): <img src='<?php echo $this->user_gravatar_image_url; ?>' />
            <?php } else { ?>
                Your avatar pic (saved locally): <img src='<?php echo $this->user_avatar_file; ?>' />
            <?php } ?>
        </div>
        <div>Your account type is: <?php echo $this->user_account_type; ?></div>
    </div>
</div>
