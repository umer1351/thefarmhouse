<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = themetechmount_get_option('skincolor');

/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}


/*
 *  Setting variables for different Theme Options
 */
$header_height        = themetechmount_get_option('header_height');
$first_menu_margin    = themetechmount_get_option('first_menu_margin');
$titlebar_height      = themetechmount_get_option('titlebar_height');
$header_height_sticky = themetechmount_get_option('header_height_sticky');
$center_logo_width    = themetechmount_get_option('center_logo_width');

$header_bg_color                   = themetechmount_get_option('header_bg_color');
$responsive_header_bg_custom_color = themetechmount_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = themetechmount_get_option('header_bg_custom_color');
$sticky_header_bg_color            = themetechmount_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = themetechmount_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;

$sticky_header_menu_bg_color        = themetechmount_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = themetechmount_get_option('sticky_header_menu_bg_custom_color');

$general_font = themetechmount_get_option('general_font');


$titlebar_bg_color          = themetechmount_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = themetechmount_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = themetechmount_get_option('titlebar_text_color');
$titlebar_text_custom_color = themetechmount_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = themetechmount_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = themetechmount_get_option('titlebar_breadcrumb_font', 'color');
$breadcum_bg_color    = themetechmount_get_option('breadcum_bg_color');
$breadcum_bg_custom_color    = themetechmount_get_option('breadcrumb_bg_custom_color');

$topbar_text_color        = themetechmount_get_option('topbar_text_color');
$topbar_text_custom_color = themetechmount_get_option('topbar_text_custom_color');
$topbar_bg_color          = themetechmount_get_option('topbar_bg_color');
$topbar_bg_custom_color   = themetechmount_get_option('topbar_bg_custom_color');

$topbar_breakpoint        = themetechmount_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = themetechmount_get_option('topbar-breakpoint-custom');


$mainmenufont            = themetechmount_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$stickymainmenufontcolor = themetechmount_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;

$dropdownmenufont = themetechmount_get_option('dropdownmenufont');

$mainmenu_active_link_color        = themetechmount_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = themetechmount_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = themetechmount_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = themetechmount_get_option('dropmenu_active_link_custom_color');

$dropmenu_background = themetechmount_get_option('dropmenu_background');

$logoMaxHeight       = themetechmount_get_option('logo_max_height');
$logoMaxHeightSticky = themetechmount_get_option('logo_max_height_sticky');

$inner_background = themetechmount_get_option('inner_background');

$headerbg_color       = themetechmount_get_option('header_bg_color');
$headerbg_customcolor = themetechmount_get_option('header_bg_custom_color');

$header_menu_bg_color        = themetechmount_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = themetechmount_get_option('header_menu_bg_custom_color');


$menu_breakpoint        = themetechmount_get_option('menu_breakpoint');
$menu_breakpoint_custom = themetechmount_get_option('menu_breakpoint-custom');

$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;

$logo_font = themetechmount_get_option('logo_font');

$loaderimg          = themetechmount_get_option('loaderimg');
$loaderimage_custom = themetechmount_get_option('loaderimage_custom');

$fbar_breakpoint        = themetechmount_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = themetechmount_get_option('floatingbar-breakpoint-custom');

$logo_box_bgcolor          = themetechmount_get_option('logo_box_bgcolor');


/* Output start
------------------------------------------------------------------------------*/ ?>

<?php
/* Custom CSS Code at top */
$custom_css_code_top = themetechmount_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	// We are not escaping / sanitizing as we are expecting css code. 
	echo trim($custom_css_code_top);
}
?>

/*------------------------------------------------------------------
* dynamic-style.php index *
[Table of contents]

1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/



/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_get_all_background_css());
?>





/**
 * 0. Font properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_get_all_font_css());
?>



/**
 * 0. Text link and hover color properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themetechmount_a_color());
?>



/**
 * 0. Header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
	.site-header.tm-bgcolor-custom:not(.is_stuck),
	.tm-header-style-classic-box.tm-header-overlay .site-header.tm-bgcolor-custom:not(.is_stuck) .tm-container-for-header{
		background-color:<?php echo esc_attr($header_bg_custom_color); ?> !important;
	}
	<?php
}
?>

/**
 * 0. Sticky header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
	.is_stuck.site-header.tm-sticky-bgcolor-custom{
		background-color:<?php echo esc_attr($sticky_header_bg_custom_color); ?> !important;
	}
	<?php
}
?>




/**
 * 0. header menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
	.tm-header-menu-bg-color-custom {
		background-color:<?php echo esc_attr($header_menu_bg_custom_color); ?>;
	}
	<?php
}
?>


/**
 * 0. Sticky menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.tm-sticky-bgcolor-custom,
	.is_stuck .tm-sticky-bgcolor-custom {
		background-color:<?php echo esc_attr($sticky_header_menu_bg_custom_color); ?> !important;
	}
	<?php
}
?>


/**
 * 0. breadcum bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $breadcum_bg_color=='custom' && !empty($breadcum_bg_custom_color) ){
	?>
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar .breadcrumb-wrapper .container,
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-titlebar-align-default .breadcrumb-wrapper .container:before, .tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-titlebar-align-default .breadcrumb-wrapper .container:after {
		background-color:<?php echo esc_attr($breadcum_bg_custom_color); ?> !important;
	}
	<?php
}
?>


/**
 * 0. List style special style
 * ----------------------------------------------------------------------------
 */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column, 
.tm-list.tm-list-icon-color- li,
.tm-list-li-content{
	color:<?php echo esc_attr($general_font['color']); ?>;
}


/**
 * 0. Page loader css
 * ----------------------------------------------------------------------------
 */
<?php echo themetechmount_get_page_loader_css(); ?>



/**
 * 0. Floating bar
 * ----------------------------------------------------------------------------
 */
<?php echo themetechmount_floatingbar_inline_css(); ?>




/**
 * 1. Background color
 * ----------------------------------------------------------------------------
 */ 


.widget.presentup_category_list_widget li.current-cat a,
.widget.presentup_category_list_widget li a:hover, 

.widget.tm_widget_nav_menu li.current_page_item a,
.widget.tm_widget_nav_menu li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover,
#totop,
.tm-site-searchform button,

.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_head,
.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_title,

.themetechmount-box-team.themetechmount-box-view-topimage-bottomcontent .themetechmount-overlay a i,

.mailchimp-inputbox input[type="submit"],
.mc_form_inside .mc_merge_var:after,
.widget_newsletterwidget .newsletter-widget:after,

.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before, 
.vc_toggle_round.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,

/*Woocommerce Section*/
.woocommerce .main-holder #content .woocommerce-error .button:hover, 
.woocommerce .main-holder #content .woocommerce-info .button:hover, 
.woocommerce .main-holder #content .woocommerce-message .button:hover,

.sidebar .widget .tagcloud a:hover,
.woocommerce .widget_shopping_cart a.button:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.main-holder .site table.cart .coupon button:hover,
.main-holder .site .woocommerce-cart-form__contents button:hover,
.main-holder .site .return-to-shop a.button:hover,
.main-holder .site .woocommerce-MyAccount-content a.woocommerce-Button:hover,
.main-holder .site-content #review_form #respond .form-submit input:hover,
.woocommerce div.product form.cart .button:hover,
table.compare-list .add-to-cart td a:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"]:hover,
.main-holder .site .woocommerce-form-coupon button:hover,
.main-holder .site .woocommerce-form-login button.woocommerce-Button:hover,
.main-holder .site .woocommerce-ResetPassword button.woocommerce-Button:hover,
.main-holder .site .woocommerce-EditAccountForm button.woocommerce-Button:hover,

.single .main-holder div.product .woocommerce-tabs ul.tabs li.active,
.main-holder .site table.cart .coupon input:hover,
.woocommerce #payment #place_order:hover,

.wishlist_table td.product-price ins,
.widget .product_list_widget ins,
.woocommerce .widget_shopping_cart a.button.checkout,
.woocommerce .wishlist_table td.product-add-to-cart a,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.main-holder .site-content nav.woocommerce-pagination ul li .page-numbers.current, 
.main-holder .site-content nav.woocommerce-pagination ul li a:hover, 
.main-holder .site-content ul.products li.product .tm-shop-icon,

.sidebar .widget .tagcloud a:hover,

.top-contact.tm-highlight:after,
.tm-social-share-links ul li a:hover,

article.post .more-link-wrapper a.more-link,

.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-flat,
.tm-sortable-list .tm-sortable-link a.selected,

.tm-col-bgcolor-skincolor .tm-bg-layer-inner,

.tm-bgcolor-skincolor > .tm-bg-layer,
footer#colophon.tm-bgcolor-skincolor > .tm-bg-layer,
.tm-titlebar-wrapper.tm-bgcolor-skincolor .tm-titlebar-wrapper-bg-layer,


/* Events Calendar */
.themetechmount-post-item-inner .tribe-events-event-cost,
.tribe-events-day .tribe-events-day-time-slot h5,
.tribe-events-button, 
#tribe-events .tribe-events-button, 
.tribe-events-button.tribe-inactive, 
#tribe-events .tribe-events-button:hover, 
.tribe-events-button:hover, 
.tribe-events-button.tribe-active:hover,
.single-tribe_events .tribe-events-schedule .tribe-events-cost,
.tribe-events-list .tribe-events-event-cost span,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
#tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, 
#tribe_events_filters_wrapper input[type=submit], 
.tribe-events-button, .tribe-events-button.tribe-active:hover, 
.tribe-events-button.tribe-inactive, .tribe-events-button:hover, 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,

.themetechmount-box-blog .themetechmount-box-content .themetechmount-box-post-date:after,
article.themetechmount-box-blog-classic .themetechmount-post-date-wrapper,

body .datepicker table tr td span.active.active, 
body .datepicker table tr td.active.active,
.datepicker table tr td.active.active:hover, 
.datepicker table tr td span.active.active:hover,

.widget .widget-title::before,
.tm-commonform input[type="submit"],

.datepicker table tr td.day:hover, 
.datepicker table tr td.day.focused,

.tm-bgcolor-skincolor.tm-rowborder-topcross:before,
.tm-bgcolor-skincolor.tm-rowborder-bottomcross:after,
.tm-bgcolor-skincolor.tm-rowborder-topbottomcross:before,
.tm-bgcolor-skincolor.tm-rowborder-topbottomcross:after,

/* Testimonals */
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-title:after,

.themetechmount-team-box-view-left-image .themetechmount-box-img-left .themetechmount-overlay a,
.themetechmount-box-team .themetechmount-box-social-links ul li a:hover,

/* Tourtab with image */
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab.vc_active>a,

.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .tm-tourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab.vc_active>a,

.wpb-js-composer .tm-tourtab-round.vc_tta.vc_general .vc_active .vc_tta-panel-title a, 


/* Portfolio */
.themetechmount-box-view-top-image .themetechmount-portfolio-likes-wrapper a.themetechmount-portfolio-likes,

/* Heading Double Border style */
.tm-element-heading-wrapper.tm-seperator-double-border .heading-seperator:after,
.tm-element-heading-wrapper.tm-seperator-double-border .heading-seperator:before,

/* Widget Border style */
.widget .widget-title:before {
	background-color: <?php echo esc_attr($skincolor); ?>;
}

/* Drop cap */
.tm-dcap-color-skincolor,

/* Slick Slider */
.tm-bgcolor-darkgrey .themetechmount-boxes-row-wrapper .slick-arrow,
.tm-col-bgcolor-darkgrey .themetechmount-boxes-row-wrapper .slick-arrow,
.themetechmount-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover,
.tm-author-social-links li a:hover,

/* Progress Bar */
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor .vc_bar,
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor span.tm-vc_label_units.vc_label_units,
span.tm-vc_label_units.vc_label_units,

/* Sidebar */
.sidebar .widget .widget-title:after,
/* Global Input Button */
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,

.tm-col-bgcolor-darkgrey .wpcf7 .tm-bookappointmentform input[type="submit"]:hover, 
.tm-row-bgcolor-darkgrey .wpcf7 .tm-bookappointmentform input[type="submit"]:hover, 

.single-tm_team_member .tm-team-social-links-wrapper ul li a:hover,

/* Testimonials Section */
.themetechmount-box-view-default .themetechmount-box-author .themetechmount-box-img .themetechmount-icon-box,

.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-3d,

/* Servicebox section */
.tm-sbox:hover .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-grey.tm-vc_icon_element-outline,
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:focus, 
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:hover,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline:hover,
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor.tm-vc_icon_element-background,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor,
.single-tm_portfolio .nav-next a, .single-tm_portfolio .nav-previous a,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-3d.tm-vc_btn3-color-inverse:hover,
.tm-bgcolor-skincolor,

.tm-header-overlay .site-header.tm-sticky-bgcolor-skincolor.is_stuck,
.site-header-menu.tm-sticky-bgcolor-skincolor.is_stuck,
.tm-header-style-infostack .site-header .tm-stickable-header.is_stuck.tm-sticky-bgcolor-skincolor,
.is_stuck.tm-sticky-bgcolor-skincolor,
.tm-header-style-infostack .site-header-menu .tm-stickable-header.is_stuck .tm-sticky-bgcolor-skincolor,

/* Blog section */
.themetechmount-box-view-overlay .themetechmount-boxes .themetechmount-box-content.themetechmount-overlay .themetechmount-icon-box a:hover,
.themetechmount-post-box-icon-wrapper,
.tm-post-format-icon-wrapper,
.themetechmount-pagination .page-numbers.current, 
.themetechmount-pagination .page-numbers:hover,

/*Search Result Page*/
.tm-sresults-title small a,
.tm-sresult-form-wrapper,

/*Pricing Table*/
.main-holder .rpt_style_basic .rpt_recommended_plan .rpt_title,
.main-holder .rpt_4_plans.rpt_style_basic .rpt_plan.rpt_recommended_plan,

/*bbpress*/
#bbpress-forums button,
#bbpress-forums ul li.bbp-header,
.themetechmount-box-blog-classic .entry-title:before,

/* square social icon */
.tm-square-social-icon .themetechmount-social-links-wrapper .social-icons li a:hover,

/*blog top-bottom content */
.themetechmount-box-blog.themetechmount-box-blog-classic .themetechmount-post-date-wrapper,

.entry-content .page-links a:hover,
mark, 
ins{
	background-color: <?php echo esc_attr($skincolor); ?> ;
}



/* Revolution button */
.Sports-Button-skin{
	background-color: <?php echo esc_attr($skincolor); ?> !important ;
    border-color: <?php echo esc_attr($skincolor); ?> !important ;
}
.Sports-Button-skin:hover{
	background-color: #202020 !important;
    border-color: #202020 !important;
}
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading{
    background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.89);
}
.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-3d,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-3d.tm-vc_btn3-color-skincolor{
	box-shadow: 0 5px 0 <?php echo themetechmount_adjustBrightness($skincolor, -30); ?>;
}
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:focus, 
.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-3d:hover{   
    box-shadow: 0 2px 0 <?php echo themetechmount_adjustBrightness($skincolor, -30); ?>;
}


/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	background-color: <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.tm-titlebar-wrapper{
	background-color:  <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>
.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr( $header_height); ?>px;
}
.tm-header-style-classic-box.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	padding-top:0px;
}

/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.tm-titlebar-wrapper .tm-titlebar-main h1.entry-title{
	color: <?php echo esc_attr($titlebar_text_custom_color); ?> !important;
}
.tm-titlebar-wrapper .tm-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_attr($titlebar_subheading_text_custom_color); ?> !important;
}
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-main .breadcrumb-wrapper, .tm-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo themetechmount_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.tm-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo themetechmount_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 0.66) !important;
}
<?php endif; ?>

.tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	height: <?php echo esc_attr($titlebar_height); ?>px;	
}
.tm-header-overlay .themetechmount-titlebar-wrapper .tm-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr(($header_height+30)); ?>px;
}
.themetechmount-header-style-3.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
	padding-top: <?php echo esc_attr(($header_height+55)) ?>px;
}

/* Logo Max-Height */
.headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeight); ?>px;
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeightSticky); ?>px;
}

/* Extra Code */
span.tm-sc-logo.tm-sc-logo-type-image {
    position: relative;
	display: block;
}
img.themetechmount-logo-img.stickylogo {
    position: absolute;
    top: 0;
    left: 0;
}
.tm-stickylogo-yes .standardlogo{
	opacity: 1;
}
.tm-stickylogo-yes .stickylogo{
	opacity: 0;
}
.is_stuck .tm-stickylogo-yes .standardlogo{
	opacity: 0;
}
.is_stuck .tm-stickylogo-yes .stickylogo{
	opacity: 1;
}

<?php $headerbgcolor = themetechmount_get_option('headerbgcolor');
if( !empty($headerbgcolor) ){ ?>
#stickable-header,
.themetechmount-header-style-4 #stickable-header .headercontent{
	background-color: <?php echo esc_attr( themetechmount_get_option('headerbgcolor') ); ?>;
}
<?php } ?>

<?php if( !empty($sticky_header_bg_color) && $sticky_header_bg_color=='custom' ){ ?>
.tm-header-overlay.themetechmount-header-style-4 .is-sticky #stickable-header,
.is-sticky #stickable-header{
	background-color: <?php echo esc_attr($sticky_header_bg_custom_color); ?>;
}
<?php } else { ?>
.tm-header-overlay.themetechmount-header-style-4 .is-sticky #stickable-header,
.is-sticky #stickable-header{
	background-color: <?php echo esc_attr($sticky_header_bg_color); ?>;
}
<?php } ?>


/**
 * 2. Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .themetechmount-topbar{
		color: rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.themetechmount-topbar-textcolor-custom .social-icons li a{
		  border: 1px solid rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.site-header .themetechmount-topbar a{
		color: rgba( <?php echo themetechmount_hex2rgb($topbar_text_custom_color); ?> , 1);
	}
<?php endif; ?>

<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.site-header .themetechmount-topbar{
		background-color: <?php echo esc_attr($topbar_bg_custom_color); ?>;
	}
<?php endif; ?>

<?php

if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_attr($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_attr($topbar_breakpoint); ?>px){
		.themetechmount-topbar-wrapper{
			display: none !important;
		}
	}

	<?php
}
?>


/**
 * 4. Border color
 * ----------------------------------------------------------------------------
 */
 
/* Progress Bar Section */
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor span.tm-vc_label_units.vc_label_units:before,
span.tm-vc_label_units.vc_label_units:before{ 
	border-color: <?php echo esc_attr($skincolor); ?> transparent; 
}

.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,

.tm-cta3-only.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-outline,

.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, select:focus, 
blockquote,
.tm-process-content img,


 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::before, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:before,

.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,

/* Header Serch section */
.tm-header-icons .tm-header-search-link a:hover,
.tm-header-icons .tm-header-wc-cart-link a:hover,

/* testimonial */
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-content .themetechmount-box-desc,


.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,  
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline,
.tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-background-color-skincolor.tm-vc_icon_element-outline,
.themetechmount-box-view-overlay .themetechmount-boxes .themetechmount-box-content.themetechmount-overlay .themetechmount-icon-box a:hover {
	border-color: <?php echo esc_attr($skincolor); ?>;
}


.themetechmount-fbar-position-default div.themetechmount-fbar-box-w,
.tm-seperator-dotted.tm-heading-style-vertical .tm-vc_general.tm-vc_cta3 .tm-vc_cta3-content-header:after,
.tm-seperator-solid.tm-heading-style-vertical .tm-vc_general.tm-vc_cta3 .tm-vc_cta3-content-header:after{
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;
}



/**
 * 5. Textcolor
 * ----------------------------------------------------------------------------
 */

.sidebar .widget a:hover,
.tm-textcolor-dark.tm-bgcolor-grey .social-icons li a:hover,
.tm-textcolor-dark.tm-bgcolor-white .social-icons li a:hover,

.tm-textcolor-dark.tm-bgcolor-grey .tm-fbar-open-icon:hover,
.tm-textcolor-dark.tm-bgcolor-white .tm-fbar-open-icon:hover,


/* Icon basic color */
.tm-icolor-skincolor,
.widget_calendar table td#today,
.vc_toggle_text_only.vc_toggle_color_skincolor .vc_toggle_title h4,

.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-outline .tm-vc_cta3-content-header,

section.error-404 .tm-big-icon,

.tm-bgcolor-darkgrey ul.presentup_contact_widget_wrapper li a:hover,
.tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-skincolor.tm-vc_cta3-style-classic .tm-vc_cta3-content-header, 
.tm-vc_icon_element-color-skincolor, 
 
.tm-bgcolor-skincolor .themetechmount-pagination .page-numbers.current, 
.tm-bgcolor-skincolor .themetechmount-pagination .page-numbers:hover,

.tm-bgcolor-darkgrey .themetechmount-twitterbox-inner .tweet-text a:hover,
.tm-bgcolor-darkgrey .themetechmount-twitterbox-inner .tweet-details a:hover,

.tm-dcap-txt-color-skincolor,

/* Accordion section */
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,

/* Global Button */ 
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-white:hover:hover,

 /* Blog */
.comment-reply-link,
.single article.post blockquote:before,
article.themetechmount-blogbox-format-link .tm-format-link-title a:hover, 
article.post.format-link .tm-format-link-title a:hover,

.themetechmount-box-blog .themetechmount-post-date-wrapper,
article.post .entry-title a:hover,
.themetechmount-meta-details a:hover,
.tm-entry-meta a:hover,

 /* Team Member meta details */ 
.tm-extra-details-list .tm-team-extra-list-title,
.tm-team-member-single-meta-value a:hover,
.tm-team-member-single-category a:hover,
.tm-team-details-list .tm-team-list-value a:hover,

 /* list style */ 
.tm-list-style-disc.tm-list-icon-color-skincolor li,
.tm-list-style-circle.tm-list-icon-color-skincolor li,
.tm-list-style-square.tm-list-icon-color-skincolor li,
.tm-list-style-decimal.tm-list-icon-color-skincolor li,
.tm-list-style-upper-alpha.tm-list-icon-color-skincolor li,
.tm-list-style-roman.tm-list-icon-color-skincolor li,
.tm-list.tm-skincolor li .tm-list-li-content,
 
/* Testimonials Section */
.tm-bgcolor-skincolor .themetechmount-box-view-default .themetechmount-box-author .themetechmount-box-img .themetechmount-icon-box, 
.testimonial_item .themetechmount-author-name,
.testimonial_item .themetechmount-author-name a,

 
/* Portfolio section*/
.themetechmount-portfolio-box-view-overlay .themetechmount-icon-box a:hover i,
.tm-bgcolor-darkgrey .themetechmount-box-view-top-image .themetechmount-box-bottom-content h4 a:hover,
.tm-textcolor-white a:hover, 
.themetechmount-box-view-top-image .themetechmount-box-category a:hover,

/* Tab content section */
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:focus, 
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:hover,
.tm-tourtab-style1.vc_general.vc_tta-tabs.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.tm-tourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a:hover, 

/* VCbutton section */
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-color-skincolor.tm-vc_btn3-style-outline, 
.tm-vc_btn_skincolor.tm-vc_btn_outlined, .tm-vc_btn_skincolor.vc_btn_square_outlined, 

.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-skincolor,
.tm-fid-icon-wrapper i,

/* Teammember section */
.themetechmount-box-team.themetechmount-box-view-overlay .themetechmount-box-content h4 a:hover,
.tm-bgcolor-skincolor .themetechmount-box-team .themetechmount-box-content h4 a:hover,
.tm-bgimage-yes .themetechmount-box-team.themetechmount-box-view-topimage-bottomcontent .themetechmount-box-content h4 a:hover,
.themetechmount-team-box-view-left-image .themetechmount-box-img-left .themetechmount-overlay a:hover,
.themetechmount-box-team.themetechmount-box-view-topimage-bottomcontent .themetechmount-overlay a:hover,

.tm-textcolor-skincolor,
.tm-textcolor-skincolor a,
.themetechmount-box-title h4 a:hover,
.tm-textcolor-skincolor.tm-custom-heading,

.themetechmount-box-blog-style3 .themetechmount-post-left .entry-date,
.themetechmount-box-topimage .themetechmount-box-content .tm-social-share-wrapper .tm-social-share-links ul li a:hover,
.themetechmount-box-blog.themetechmount-box-topimage .themetechmount-box-title h4 a:hover,

/* Text color skin in row secion*/
.tm-background-image.tm-row-textcolor-skin h1, 
.tm-background-image.tm-row-textcolor-skin h2, 
.tm-background-image.tm-row-textcolor-skin h3, 
.tm-background-image.tm-row-textcolor-skin h4, 
.tm-background-image.tm-row-textcolor-skin h5, 
.tm-background-image.tm-row-textcolor-skin h6,
.tm-background-image.tm-row-textcolor-skin .tm-element-heading-wrapper h2,
.tm-background-image.tm-row-textcolor-skin .themetechmount-testimonial-title,
.tm-background-image.tm-row-textcolor-skin a,
.tm-background-image.tm-row-textcolor-skin .item-content a:hover,

.tm-row-textcolor-skin h1, 
.tm-row-textcolor-skin h2, 
.tm-row-textcolor-skin h3, 
.tm-row-textcolor-skin h4, 
.tm-row-textcolor-skin h5, 
.tm-row-textcolor-skin h6,
.tm-row-textcolor-skin .tm-element-heading-wrapper h2,
.tm-row-textcolor-skin .themetechmount-testimonial-title,
.tm-row-textcolor-skin a,
.tm-row-textcolor-skin .item-content a:hover,

ul.presentup_contact_widget_wrapper.call-email-footer li:before,

/*Tweets*/
.widget_latest_tweets_widget p.tweet-text:before,

/*Events Calendar*/
.themetechmount-events-box-view-top-image-details .themetechmount-events-meta .tribe-events-event-cost,

/*Price table*/
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_recurrence,
.main-holder .rpt_style_basic .rpt_plan .rpt_features .rpt_feature:before,
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_price,

/*search result page*/
.tm-sresults-first-row .tm-list-li-content a:hover,
.tm-results-post ul.tm-recent-post-list > li > a:hover,
.tm-results-page .tm-list-li-content a:hover,
.tm-sresults-first-row ul.tm-recent-post-list > li > a:hover,

.tm-team-list-title i,
.tm-bgcolor-darkgrey .themetechmount-box-view-left-image .themetechmount-box-title a:hover,
.tm-team-member-view-wide-image .tm-team-details-list .tm-team-list-title,

/*woocommerce*/
.woocommerce-info:before,
.woocommerce-message:before,

.main-holder .site-content ul.products li.product .price,
.main-holder .site-content .star-rating span:before,

.main-holder .site-content ul.products li.product .price ins,
.single .main-holder #content div.product .price ins,

.woocommerce .price .woocommerce-Price-amount,

/* Special Section */
.tm-element-heading-wrapper .tm-vc_cta3-headers h2 strong,
.tm-element-heading-wrapper .tm-vc_cta3-headers h4 strong,
h2.tm-custom-heading strong,
ul.tm-pricelist-block li .service-price strong,
.tm-header-block .themetechmount-topbar-wrapper .social-icons li>a:hover,
.tm-vc_general.tm-vc_btn3.tm-vc_btn3-style-text.tm-vc_btn3-color-black:hover{
	color: <?php echo esc_attr($skincolor); ?>;
}





/*** Defaultmenu ***/     
/*Wordpress Main Menu*/      

/* Menu hover and select section */ 
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,    
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,     
.tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,             

/*Wordpress Dropdown Menu*/
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,    
.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,    
    
 
 /*Mega Main Menu*/      
 .tm-mmenu-active-color-skin .site-header.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,  
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,      
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,           


/*Mega Dropdown Menu*/  
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,      
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a{
    color: <?php echo esc_attr($skincolor); ?> ;
}
    

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        /* Main Menu Active Link Color --------------------------------*/                
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
        .tm-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
        
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
        .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
            color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
        }
    <?php } ?>

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>



/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tmicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgba( <?php echo esc_attr( themetechmount_hex2rgb($mainMenuFontColor) ); ?> , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: <?php echo esc_attr($skincolor); ?> !important;
}

<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.tm-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgba( <?php echo themetechmount_hex2rgb($dropdownmenufont['color']); ?> , 0.8);
		font-weight: normal;
	}
<?php endif; ?>
#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
	padding-top: 10px;
}

/*Logo Color --------------------------------*/ 
h1.site-title{
	color: <?php echo esc_attr($logo_font['color']); ?>;
}


/**
 * 9. Genral Elements
 * ----------------------------------------------------------------------------
 */

/* Site Pre-loader image */
<?php if( isset($loaderimage_custom['url']) && $loaderimage_custom['url']!='' ): ?>
.pageoverlay{
	background-image:url('<?php echo esc_attr($loaderimage_custom['url']); ?>');
}
<?php elseif( $loaderimg!='' ) : ?>
.pageoverlay{
	background-image:url('../images/loader<?php echo esc_attr($loaderimg); ?>.gif');
}
<?php endif; ?>


/**
 * 10. Heading Elements
 * ----------------------------------------------------------------------------
 */
.tm-textcolor-skincolor h1,
.tm-textcolor-skincolor h2,
.tm-textcolor-skincolor h3,
.tm-textcolor-skincolor h4,
.tm-textcolor-skincolor h5,
.tm-textcolor-skincolor h6,

.tm-textcolor-skincolor .tm-vc_cta3-content-header h2{
	color: <?php echo esc_attr($skincolor); ?> !important;
}
.tm-textcolor-skincolor .tm-vc_cta3-content-header h4{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.90) !important;
}
.tm-textcolor-skincolor .tm-vc_cta3-content .tm-cta3-description{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.60) !important;
}
.tm-textcolor-skincolor{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.60);
}
.tm-textcolor-skincolor a{
	color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.80);
}



/**
 * 10. Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php

if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){

	if( esc_attr($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}

	?>
	
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_attr($fbar_breakpoint); ?>px){
	.themetechmount-fbar-btn,
    .themetechmount-fbar-box-w{
		display: none !important;
	}
}

	<?php
}
?>




/********************** Tab ****************************/

.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-tab>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:hover{
    background-color: <?php echo esc_attr($skincolor); ?>;     
    border-color: <?php echo esc_attr($skincolor); ?>;     
    color: #fff;
}
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-tab>a{
    background-color: <?php echo esc_attr($skincolor); ?> ;   
}

/* Modern skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: <?php echo esc_attr($skincolor); ?> ; 
}

/* Outline skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a:hover,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: transparent;
    color: <?php echo esc_attr($skincolor); ?> ; 
}

.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: <?php echo esc_attr($skincolor); ?> ; 
    color: #fff;
}
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.ttm-accordion-styleone .vc_tta-icon,
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.ttm-accordion-styleone .vc_tta-controls-icon,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a{
	color: <?php echo esc_attr($skincolor); ?> ; 
}


/**
 * Extra section
 * ----------------------------------------------------------------------------
 */

.themetechmount-box-blog .themetechmount-blogbox-desc-footer a,
.tribe-events-list-separator-month span,
#tribe-events-content .tribe-events-read-more:hover,
.tribe-events-list .tribe-events-loop .tribe-event-featured .tribe-events-event-cost .ticket-cost,
#tribe-events-content.tribe-events-single .tribe-events-back a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-next a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-previous a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-left a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-right a:hover,
.comment-list a.comment-reply-link:hover,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat:focus,
.tm-vc_btn3.tm-vc_btn3-color-black.tm-vc_btn3-style-flat:hover,
.tm-vc_btn3.tm-vc_btn3-color-black:focus, .tm-vc_btn3.tm-vc_btn3-color-black:hover,
.tm-header-icons .tm-header-wc-cart-link span.number-cart,
.footer .social-icons li > a:hover,
.tm-header-icons .tm-header-search-link a,
.tm-static-box-wrapper:hover .tm-static-box-content,
.ttm-ptablebox-price-w:after, .ttm-ptablebox-price-w:before,
.themetechmount-box-events .event-box-content .themetechmount-eventbox-footer a:hover,
.themetechmount-events-box-view-top-image-details .themetechmount-post-readmore a:hover,
.themetechmount-box-events .themetechmount-meta-date,
.tm-col-bgcolor-darkgrey .social-icons li > a:hover,
.tm-bgcolor-darkgrey .social-icons li > a:hover,
.themetechmount-topbar-wrapper .themetechmount-fbar-btn,
.comment-list a.comment-reply-link:hover,
.tm-skincolor-bg,
.footer .widget .widget-title:before,
.slick-dots li.slick-active button,
.make-appoint-form input[type="submit"],
.get-qoute-form  input[type="submit"],
.tm-bg-highlight,
.tm-bgcolor-darkgrey .themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.tm-row .tm-col-bgcolor-darkgrey .themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-desc:after,
.wpcf7 .tm-contactform input[type="radio"]:checked:before,
.tm-dropcap.tm-bgcolor-skincolor,
.tm-getquote-form .field-group i,
.themetechmount-twitterbox-inner i,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor .tm-titlebar .breadcrumb-wrapper .container,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor  .breadcrumb-wrapper .container:before,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom.tm-breadcrumb-bgcolor-skincolor .breadcrumb-wrapper .container:after,
.our-services-sector .vc_column-inner > .wpb_wrapper .tm-sbox:before {
	background-color: <?php echo esc_attr($skincolor); ?>; 
}
.k_flying_searchform_wrapper,
.themetechmount-box-portfolio.themetechmount-box-view-overlay .themetechmount-overlay,
.themetechmount-box-portfolio .themetechmount-overlay {
	background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.95);
}
.tm-sbox-hover .tm-sbox:hover {
	border-bottom: 2px solid <?php echo esc_attr($skincolor); ?>;	
}

.tm-serviceboxstyle1 .tm-sbox-iconalign-top-left .tm-sbox-wrapper-bg-layer,
.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar .breadcrumb-wrapper .container,
.ttm-skin-outline-border .tm-vc_icon_element-style-rounded:before,
.tm-sbox.tm-iconbox-bottom-border .tm-vc_cta3-icons:after,
.tm-bgcolor-darkgrey .wpcf7 .tm-contactform .wpcf7-textarea:focus,
.wpcf7 .tm-commonform .wpcf7-text:focus,
.wpcf7 .tm-commonform textarea:focus {
	border-color:<?php echo esc_attr($skincolor); ?>;
}

.tm-sbox.tm-iconbox-bottom-border .tm-vc_cta3-icons:after,
.tm-sevicebox-skinborder .tm-sbox .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner.tm-vc_icon_element-color-skincolor,
.tm-skincolor-bottom-boder {
	border-color: <?php echo esc_attr($skincolor); ?>;	
}
.widget .widget-title{
	border-left-color: <?php echo esc_attr($skincolor); ?>;	
}

.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-menu-parent > a,
.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,

.themetechmount-box-view-topimage-bottomcontent:hover .themetechmount-box-content h4 a,
#tribe-events-content a:hover,
.tribe-event-schedule-details,
.comment-meta a:hover,
.themetechmount-events-box-view-top-image-details .themetechmount-eventbox-footer a:hover,
.themetechmount-events-box-view-top-image-details .tribe-events-vanue i,
.themetechmount-box-team.themetechmount-box-view-left-image .tm-team-details-wrapper a i,
.themetechmount-box-team.themetechmount-box-view-left-image .tm-team-details-wrapper a:hover,
.themetechmount-box.themetechmount-box-portfolio .themetechmount-icon-box a:hover i,
.wpcf7 .tm-contactform .field-group i,
.tm-ptablebox .tm-ptablebox-cur-symbol-after,
.tm-ptablebox .tm-ptablebox-cur-symbol-before,
.tm-ptablebox .tm-ptablebox-price,
.themetechmount-box-events .event-box-content .tribe-events-vanue i,
.themetechmount-box-events .event-box-content .themetechmount-meta-details i,
.tm-image-with-box-hover:hover .tm_photo_link .vc_single_image-wrapper:after,
.tm-comment-owner a:hover,
.tm-header-style-infostack .tm-top-info-con .tm-sbox .tm-vc_cta3-content-header h4 a:hover,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-controls-icon-position-right .vc_tta-controls-icon,
.themetechmount-boxes-testimonial.themetechmount-boxes-col-one .themetechmount-box-view-default .themetechmount-box-title h3 a:hover,
.make-appoint-form .wpcf7 label i,
h4.tm-custom-heading.tm-skincolor,
h3.tm-custom-heading.tm-skincolor,
.tm-bgcolor-darkgrey .tm-custom-heading.tm-skincolor,
.second-footer .container.tm-container-for-footer .row > .widget-area:first-child ul.presentup_contact_widget_wrapper li:before,
.main-holder .rpt_style_basic .rpt_plan .rpt_title{
	color: <?php echo esc_attr($skincolor); ?>;	
}
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-panel .vc_tta-panel-title>a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-tab >a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey .vc_tta-tab.vc_active>a {
    border-color: <?php echo esc_attr($skincolor); ?>;	
	background-color: <?php echo esc_attr($skincolor); ?>;	
}
.serviceboxes-with-banner.tm-servicebox-hover .tm-sbox.tm-bg.tm-bgimage-yes:hover .tm-bg-layer {
    background-color: <?php echo esc_attr($skincolor); ?> !important;
}
.vc_row .tm-skincolor,
.tm-row .tm-skincolor,
.tm-skincolor,
.first-footer .tm-sbox .tm-vc_cta3-content-header h2 {
	color: <?php echo esc_attr($skincolor); ?> !important;	 
}

/*woocommerce*/
.ttm-ptablebox-price-w,
.rpt_style_basic .rpt_plan:not(.rpt_recommended_plan) .rpt_custom_btn a.tm-vc_general.tm-vc_btn3:hover {
	border-color: <?php echo esc_attr($skincolor); ?> !important;	 
}

.woocommerce-message,
.woocommerce-info,
.single .main-holder div.product .woocommerce-tabs ul.tabs li.active:before,
.tm-search-overlay {
    border-top-color: <?php echo esc_attr($skincolor); ?>;
}

/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require_once( get_template_directory() .'/css/dynamic-menu-style.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */




/******************************************************/
/******************* Custom Code **********************/

<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = themetechmount_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = html_entity_decode($custom_css_code);
	echo trim($custom_css_code);
}
?>

/******************************************************/