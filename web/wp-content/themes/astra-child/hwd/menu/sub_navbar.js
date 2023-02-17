jQuery( document ).ready(function() {

    // close mobile menu
    jQuery("#hwSubNavbarCloseMobileMenuBtn").on('click', function(event){
        event.stopPropagation();
        event.stopImmediatePropagation();

        // toggle mobile menu
        jQuery('.hwd-sub-navbar-container').toggle();
    });

    // on dropdown mobile menu item clicks
    jQuery(".hwd-subnavbar-btn").on('click', function(event){
        event.stopPropagation();
        event.stopImmediatePropagation();

        let linkId = jQuery(this).attr('id').replace('hwd_subNavbarLeftBtn', '');
        if(Number(linkId) > 0){
            if(!jQuery('#hwd_subNavbarDropDown'+linkId).hasClass('hwd-dropdown-selected')){
                jQuery(".hwd-dropdown-content").hide();
                jQuery(".hwd-dropdown-li").removeClass('hwd-dropdown-selected');
            }
            jQuery('#hwd_subNavbarLeftId'+linkId).toggle();
            jQuery('#hwd_subNavbarDropDown'+linkId).toggleClass('hwd-dropdown-selected');
        }

    });

    // open mobile menu
    jQuery(".ast-mobile-menu-trigger-minimal").on('click', function(event){
        event.stopPropagation();
        event.stopImmediatePropagation();

        // toggle mobile menu
        jQuery('.hwd-sub-navbar-container').toggle();
    });

});
