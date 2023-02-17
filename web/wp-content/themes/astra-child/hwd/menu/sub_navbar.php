<?php
require_once __DIR__ . '/../models/hwd_menu_item.php';
function hwdSubNavbar() {

    // NOTE: THIS NAME MUST MATCH THE SAME IN THE WP ADMIN DASH
    $leftLinks = hwdWpNavMenuItemsToHwdMenuItems(get_option('hwd_sub_navbar', 'Sub Navbar'));

	ob_start();
	?>
	<div class="hwd-sub-navbar-container hwd-menu-container">
		<div class="hwd-sub-navbar-left">
            <div class="hwd-mobile-sub-navbar-toggle">
                <button class="hwd-mobile-sub-navbar-toggle-btn" id="hwSubNavbarCloseMobileMenuBtn"><span>&#10005;</span></button>
            </div>
			<ul class="hwd-sub-navbar-ul">
				<?php foreach ( $leftLinks as $leftLinkIndex => $leftLink ) : ?>
					<?php if ( $leftLink->hasChildren() ) : ?>
						<li id="hwd_subNavbarDropDown<?php echo $leftLinkIndex; ?>" class="hwd-dropdown-li">
							<div class="hwd-dropdown" >
								<?php if ( $leftLink->hasLink() && !$leftLink->hasChildren() ) : ?>
									<span class="hwd-dropbtn" ><a href="<?php echo $leftLink->link; ?>"><?php echo $leftLink->title; ?></a></span>
								<?php else : ?>
									<span class="hwd-dropbtn hwd-subnavbar-btn" id="hwd_subNavbarLeftBtn<?php echo $leftLinkIndex; ?>"><?php echo $leftLink->title; ?><img class="hwd-dropbtn-icon" alt="<?php echo $leftLink->title; ?> Expand Icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Nav_ArrowDropdown.svg' ); ?>"/></span>
								<?php endif; ?>
								<div class="hwd-dropdown-content" id="hwd_subNavbarLeftId<?php echo $leftLinkIndex; ?>">
								<?php foreach ( $leftLink->children as $child ) : ?>
									<a class="hwd-dropdown-content-link" href="<?php echo $child->link; ?>"><?php echo $child->title; ?></a>
								<?php endforeach; ?>
								</div>
							</div>
						</li>
					<?php else : ?>
						<li class="hwd-no-dropdown-link"><a class="font-roboto-slab-extra-bold" href="<?php echo $leftLink->link; ?>"><?php echo $leftLink->title; ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div>
			<ul class="hwd-sub-navbar-ul hwd-sub-navbar-ul-social">
				<li>
					<a href="https://www.instagram.com/fenzidogsportsacademy/">
						<img class="hwd-sub-navbar-social-icon" alt="Instagram" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Insta.svg' ); ?>"/>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/FenziDogSportsAcademy">
						<img class="hwd-sub-navbar-social-icon" alt="Facebook" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Facebook.svg' ); ?>"/>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/FenziAcademy">
						<img class="hwd-sub-navbar-social-icon" alt="Twitter" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon/FDSA_icon_Social_Twitter.svg' ); ?>"/>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<?php
	echo ob_get_clean();
}
add_action( 'astra_header_after', 'hwdSubNavbar', 10 );


function hwdSubNavbarJS() {
	wp_enqueue_script(
		'hwd-sub-navbar',
		get_template_directory_uri() . '/hwd/menu/sub_navbar.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'hwdSubNavbarJS' );
?>
