<?php

function hwdGetDefaultLogo(){

}

/**
 * Overrides web/wp-content/themes/astra-child/inc/markup-extras.php
 *
 * Return or echo site logo markup.
 *
 * @since 1.0.0
 * @param  string  $device Device name.
 * @param  boolean $echo Echo markup.
 * @return mixed echo or return markup.
 */
function astra_logo( $device = 'desktop', $echo = true ) {

    $site_tagline         = astra_get_option( 'display-site-tagline-responsive' );
    $display_site_tagline = ( $site_tagline['desktop'] || $site_tagline['tablet'] || $site_tagline['mobile'] ) ? true : false;
    $site_title           = astra_get_option( 'display-site-title-responsive' );
    $display_site_title   = ( $site_title['desktop'] || $site_title['tablet'] || $site_title['mobile'] ) ? true : false;
    $ast_custom_logo_id   = get_theme_mod( 'custom_logo' );

    $html            = '';
    $has_custom_logo = apply_filters( 'astra_has_custom_logo', has_custom_logo() );
    $trans_logo      = astra_get_option( 'transparent-header-logo' );
    $diff_trans_logo = astra_get_option( 'different-transparent-logo' );
    $use_default_hwd_logo = !( $has_custom_logo && ! empty( $ast_custom_logo_id ) );

    // Site logo.
    if ($use_default_hwd_logo || ( $has_custom_logo && ! empty( $ast_custom_logo_id ) ) || ( true === $diff_trans_logo && ! empty( $trans_logo ) ) ) {

        if ( apply_filters( 'astra_replace_logo_width', true ) ) {
            add_filter( 'wp_get_attachment_image_src', 'astra_replace_header_logo', 10, 4 );
        }

        $html .= '<span class="site-logo-img">';
        if($use_default_hwd_logo){
            $html .= sprintf( '<a href="%1$s" class="hwd-site-logo" rel="home" itemprop="url">%2$s</a>',
                esc_url( home_url( '/' ) ),
                "<img src='".esc_url( get_template_directory_uri() . '/assets/images/FDSA_PrimaryLogo_Primary_FullColorWhite.svg' )."' />"
            );
        }else{
            $html .= get_custom_logo();
        }
        $html .= '</span>';

        if ( apply_filters( 'astra_replace_logo_width', true ) ) {
            remove_filter( 'wp_get_attachment_image_src', 'astra_replace_header_logo', 10 );
        }
    }

    // let's remove the tagline
    //$html .= astra_get_site_title_tagline( $display_site_title, $display_site_tagline, $device );

    $html = apply_filters( 'astra_logo', $html, $display_site_title, $display_site_tagline );

    /**
     * Echo or Return the Logo Markup
     */
    if ( $echo ) {
        echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    } else {
        return $html;
    }
}
