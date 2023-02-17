<?php
require_once __DIR__ . '/../models/hwd_menu_item.php';
require_once __DIR__ . '/../widgets/subscribe_widget.php';
function hwdFooter() {

	// NOTE: THIS NAME MUST MATCH THE SAME IN THE WP ADMIN DASH
	$footerLinks = hwdWpNavMenuItemsToHwdMenuItems( get_option('hwd_footer_menu', 'Footer Menu') );

    $footerLinksWithChildren = [];
    $footerLinksWithoutChildren = [];
    foreach($footerLinks AS $footerLink){
        if ( $footerLink->hasChildren() ) {
            $footerLinksWithChildren[] = $footerLink;
        }else{
            $footerLinksWithoutChildren[] = $footerLink;
        }
    }

	ob_start(); ?>
    <div class="hwd-activecampaign-form-subscribe">
        <?php echo do_shortcode("[activecampaign form=1]"); ?>
    </div>
	<footer class="hwd-footer hwd-menu-container">
		<div class="hwd-footer-lists">
			<?php foreach ( $footerLinksWithChildren as  $footerLink ) : ?>
                <ul class="hwd-footer-ul">
                    <?php if ( $footerLink->hasLink() ) : ?>
                        <li class="hwd-footer-ul-title"><a href="<?php echo $footerLink->link; ?>"><?php echo $footerLink->title; ?></a></li>
                    <?php else : ?>
                        <li class="hwd-footer-ul-title"><?php echo $footerLink->title; ?></li>
                    <?php endif; ?>
                    <?php if ( $footerLink->hasChildren() ) : ?>
                        <?php foreach ( $footerLink->children as $child ) : ?>
                            <li class="hwd-footer-ul-item"><a href="<?php echo $child->link; ?>"><?php echo $child->title; ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
			<?php endforeach; ?>
            <ul class="hwd-footer-ul">
			<?php foreach ( $footerLinksWithoutChildren as  $footerLink ) : ?>
                    <?php if ( $footerLink->hasLink() ) : ?>
                        <li class="hwd-footer-ul-title"><a href="<?php echo $footerLink->link; ?>"><?php echo $footerLink->title; ?></a></li>
                    <?php else : ?>
                        <li class="hwd-footer-ul-title"><?php echo $footerLink->title; ?></li>
                    <?php endif; ?>
            <?php endforeach; ?>
            </ul>
			<div class="hwd-footer-logo-container">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/FDSA_PrimaryLogo_Primary_FullColorWhite.svg' ); ?>" alt="FDSA"/>
			</div>
		</div>

		<div class="hwd-footer-bottom">
			<ul class="hwd-footer-social-ul">
				<li>
					<a href="https://www.instagram.com/fenzidogsportsacademy/">
						<img class="hwd-footer-social-icon" alt="Instagram" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Insta.svg' ); ?>"/>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/FenziDogSportsAcademy">
						<img class="hwd-footer-social-icon" alt="Facebook" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Facebook.svg' ); ?>"/>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/FenziAcademy">
						<img class="hwd-footer-social-icon" alt="Twitter" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Twitter.svg' ); ?>"/>
					</a>
				</li>
			</ul>
			<div class="hwd-footer-contact">
				<p>Copyright © Fenzi Dog Sports Academy and individual instructors.</p>
				<p><a href="mailto:help@fenziacademy.com">Technical support - send email to help@fenziacademy.com</a></p>
			</div>
		</div>
	</footer>
	<?php
	echo ob_get_clean();
}


?>
