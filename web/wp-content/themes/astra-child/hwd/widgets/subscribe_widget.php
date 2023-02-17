<?php
function hwdSubscribeWidget() {
	ob_start();
	?>
    <div class="hwd-subscribe-container hwd-menu-container">
        <h4 class="hwd-subscribe-header font-roboto-slab-bold"><?php echo get_option('hwd_subscribe_header', 'Sign up to get the latest tips form our instructors');?></h4>
        <form class="hwd-subscribe-form">
            <div class="hwd-subscribe-form-reg-flex">
                <input type="text" placeholder="Your First Name..." class="hwd-w-100 hwd-translucent-input" />
            </div>
            <div class="hwd-subscribe-form-reg-flex">
                <input type="text" placeholder="Your Last Name..." class="hwd-w-100 hwd-translucent-input" />
            </div>
            <div class="hwd-subscribe-form-extra-flex">
                <input type="email" placeholder="Your Email Address..." class="hwd-w-100 hwd-translucent-input" />
            </div>
            <div class="hwd-subscribe-form-reg-flex">
                <button type="button" class="hwd-btn hwd-btn-white hwd-w-100-mobile"><?php echo get_option('hwd_subscribe_button', 'Subscribe');?></button>
            </div>
        </form>
    </div>
	<?php
	echo ob_get_clean();
}


?>
