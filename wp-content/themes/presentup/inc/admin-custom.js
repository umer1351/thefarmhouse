/**
 *  Admin custom JS file
 */
"use strict";
 
 
// Header Style - Change options based on selected header style on click 
function themetechmount_header_style_change_triggers(){
	
	"use strict";
	
	// Default value
	var header_bg_color               = 'white';
	var header_bg_custom_color        = 'darkgrey';
	var titlebar_background_color	  = 'custom';
	var titlebar_text_color			  = 'white';
	var topbar_right_text			  = '<ul class="top-contact"><li><i class="fa fa-envelope-o"></i> <strong>Email: </strong><a href="mailto:info@example.com.com">info@example.com</a></li></ul>[tm-btn title="Book Event" style="text" shape="square" color="white" add_icon="true" i_type="fontawesome" i_icon_fontawesome="fa fa-caret-right" link="url:%23|||"][tm-social-links]';
	var topbar_left_text			  = '<ul class="top-contact"><li><i class="fa fa-map-marker"></i>206 South Marion Avenue, Florida</li><li><i class="fa fa-phone"></i><strong>Call</strong>: +1 (143) 456-7897</li></ul>';
	var titlebar_height				  = '335';
	var mainmenufont_color            = '#283d58';
	var topbar_bg_color				  = 'skincolor';
	var header_height                 = '105';
	var logoimg						  = 'logo.png';
	var logo_max_height				  = '60';
	var mainmenu_active_link_color    = 'skin';
	var stickymainmenufontcolor_color = '#283d58';
	var sticky_header_bg_color        = 'white';
	var dropmenu_background_color     = '#ffffff';
	var dropdownmenufont_color        = '#5d6576';
	
	
	jQuery('input[name="presentup_theme_options[headerstyle]"]').change(function() {
		
		var imgurl = jQuery(this).next().attr('src').split('inc');
		imgurl = imgurl[0]+ 'images/';
		
		console.log(this.value);
		
		if (this.value == 'classic-highlight') { // Classic Highlight
			jQuery('select[name="presentup_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="presentup_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="presentup_theme_options[titlebar_text_color]"]').val('custom').change();
			jQuery('textarea[name="presentup_theme_options[topbar_right_text]"]').val(topbar_right_text);  //
			jQuery('input[name="presentup_theme_options[titlebar_height]"').val(titlebar_height);  // Titlebar height
			jQuery('input[name="presentup_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="presentup_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('input[name="presentup_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="presentup_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('input[name="presentup_theme_options[header_height]"]').val(header_height);  // Header Height
			jQuery('input[name="presentup_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="presentup_theme_options[logoimg][thumb-url]"]').val( imgurl+logoimg );
			jQuery('input[name="presentup_theme_options[logoimg][full-url]').val( imgurl+logoimg );
			jQuery('input[name="presentup_theme_options[logo_max_height]"]').val(logo_max_height);  //
			jQuery('select[name="presentup_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="presentup_theme_options[stickymainmenufontcolor]"]').iris('color', stickymainmenufontcolor_color);  // 
			jQuery('select[name="presentup_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();		
			jQuery('input[name="presentup_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="presentup_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  // Dropdown Menu color
				
		} else if ( this.value == 'classic-overlay' || this.value == 'overlay' ) {  // Overlay
			jQuery('select[name="presentup_theme_options[header_bg_color]"]').val(header_bg_custom_color).change();
			jQuery('input[name="presentup_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="presentup_theme_options[titlebar_text_color]"]').val('custom').change();
			jQuery('textarea[name="presentup_theme_options[topbar_left_text]"]').val(topbar_left_text); 
			jQuery('textarea[name="presentup_theme_options[topbar_right_text]"]').val(topbar_right_text); //
			jQuery('input[name="presentup_theme_options[show_topbar]"]').prop('checked', false);  // Show topbar
			jQuery('input[name="presentup_theme_options[titlebar_height]"').val('540');  // Titlebar height
			jQuery('input[name="presentup_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('input[name="presentup_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="presentup_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('input[name="presentup_theme_options[header_height]"]').val('117');  // Header Height
			jQuery('input[name="presentup_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="presentup_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo-white.png' );
			jQuery('input[name="presentup_theme_options[logoimg][full-url]').val( imgurl+'logo-white.png' );
			jQuery('input[name="presentup_theme_options[logo_max_height]"]').val('60');  //
			jQuery('select[name="presentup_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="presentup_theme_options[stickymainmenufontcolor]"]').iris('color', '#ffffff');  // 
			jQuery('select[name="presentup_theme_options[sticky_header_bg_color]"]').val('darkgrey').change();
			jQuery('input[name="presentup_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="presentup_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  

		} else if (this.value == 'infostack') {
			jQuery('select[name="presentup_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="presentup_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="presentup_theme_options[titlebar_text_color]"]').val('custom').change();
			jQuery('textarea[name="presentup_theme_options[topbar_left_text]"]').val(topbar_left_text); 
			jQuery('textarea[name="presentup_theme_options[topbar_right_text]"]').val(topbar_right_text); //
			jQuery('input[name="presentup_theme_options[titlebar_height]"').val('417');  // Titlebar height
			jQuery('input[name="presentup_theme_options[show_topbar]"]').prop('checked', false);  // Show topbar
			jQuery('input[name="presentup_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('input[name="presentup_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="presentup_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('input[name="presentup_theme_options[header_height]"]').val('154');  // Header Height
			jQuery('input[name="presentup_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="presentup_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo.png' );
			jQuery('input[name="presentup_theme_options[logoimg][full-url]').val( imgurl+'logo.png' );
			jQuery('input[name="presentup_theme_options[logo_max_height]"]').val('55');  //
			jQuery('input[name="presentup_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="presentup_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="presentup_theme_options[stickymainmenufontcolor]"]').iris('color', '#ffffff');  // 
			jQuery('select[name="presentup_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();
			
			jQuery('input[name="presentup_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="presentup_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  // Dropdown Menu color
			
		} else if (this.value == 'classic-box-overlay') {
			jQuery('select[name="presentup_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="presentup_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="presentup_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('select[name="presentup_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('input[name="presentup_theme_options[header_height]"]').val('105');  // Header Height
			jQuery('input[name="presentup_theme_options[logo_max_height]"]').val('55');   //
			jQuery('textarea[name="presentup_theme_options[topbar_left_text]"]').val(topbar_left_text); 
			jQuery('textarea[name="presentup_theme_options[topbar_right_text]"]').val(topbar_right_text);  //
			jQuery('input[name="presentup_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="presentup_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="presentup_theme_options[titlebar_height]"').val('360'); // Titlebar height
			jQuery('input[name="presentup_theme_options[stickymainmenufontcolor]"').iris('color', stickymainmenufontcolor_color);  // 
			jQuery('input[name="presentup_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="presentup_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo.png' );
			jQuery('input[name="presentup_theme_options[logoimg][full-url]').val( imgurl+'logo.png' );
			jQuery('input[name="presentup_theme_options[logo_max_height]"]').val('55'); 			
			jQuery('input[name="presentup_theme_options[dropmenu_background][color]"]').iris('color', '#ffffff');  // Dropdown Menu color
			jQuery('input[name="presentup_theme_options[dropdownmenufont][color]"]').iris('color', '#0a0c0e');  // Dropdown Menu color
			jQuery('select[name="presentup_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();
			
		}
		
	});
}
 
 
 
 
 
 
 
/**
 *  Codestar Framework : themetechmount_background JS
 */
jQuery.fn.TM_CSFRAMEWORK_BG_IMAGE_UPLOADER = function($) {
    return this.each(function() {

	var $this      = jQuery(this),
		$add       = $this.find('.cs-add'),
		$preview   = $this.find('.cs-image-preview'),
		$noimgtext = $this.find('.tm-cs-background-heading-noimg'),
		$closeicon = $this.find('.tm-cs-remove'),
		$remove    = $this.find('.cs-remove'),
		$input     = $this.find('input.tm-background-image'),
		$inputid   = $this.find('input.tm-background-imageid'),
		$img       = $this.find('img'),
		$btntitleadd    = $this.find('.tm-cs-background-text-add-image').text(),
		$btntitlechange = $this.find('.tm-cs-background-text-change-image').text(),
		wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;

          $img.removeClass('hidden');
		  $closeicon.removeClass('hidden');
		  $noimgtext.addClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.url ).trigger('change');
		  $inputid.val( attachment.id ).trigger('change');
			$add.text($btntitlechange);
        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
        $img.addClass('hidden');
		$closeicon.addClass('hidden');
		$noimgtext.removeClass('hidden');
		$add.text($btntitleadd);
      });

    });

  };

  
  
  
  
  

/**
 *  Codestar Framework : themetechmount_typography JS
 */
  jQuery.fn.TM_CSFRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {

      var typography      = jQuery(this),
          family_select   = typography.find('.cs-typo-family'),
          variants_select = typography.find('.cs-typo-variant'),
          typography_type = typography.find('.cs-typo-font');

      family_select.on('change', function() {

        var _this     = jQuery(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');

        if( variants_select.length ) {

          variants_select.find('option').remove();

          jQuery.each( _variants.split('|'), function( key, text ) {
            variants_select.append('<option value="'+ text +'">'+ text +'</option>');
          });

          variants_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');

        }

        typography_type.val(_type);

      });

    });
  };
  
  
  
  

/**
 *  themetechmount_image 
 */
  jQuery.fn.TM_CSFRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {

      var $this     = jQuery(this),
          $add      = $this.find('.cs-add'),
          $preview  = $this.find('.cs-image-preview'),
          $remove   = $this.find('.cs-remove'),
          $input    = $this.find('input.tm-cs-imgid'),
		  $thumbimg = $this.find('input.tm-cs-thumburl'),
		  $fullimg  = $this.find('input.tm-cs-fullurl'),
          $img      = $this.find('img'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
		  var fullimg    = ( typeof attachment.sizes.full.url !== 'undefined' ) ? attachment.sizes.full.url : '';

          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');
		  $fullimg.val( fullimg ).trigger('change');
		  $thumbimg.val( thumbnail ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$fullimg.val('').trigger('change');
		$thumbimg.val('').trigger('change');
        $preview.addClass('hidden');
      });

    });

  };
  
  
  
  
/**
 *  Titlebar text custom color show/hide
 */ 
function themetechmount_show_hide_titlebar_textcolor(){
	
	var $this      = jQuery( 'select[name="presentup_theme_options[titlebar_text_color]"]' );
	var $page_this = jQuery( 'select[name="_themetechmount_metabox_group[titlebar_text_color]"]' );
	
	if( $this.length > 0 ){
		if( jQuery($this).val()=='custom' ){
			jQuery( 'input[name="presentup_theme_options[titlebar_heading_font][color]"]' ).closest('.tm-typography-font-color-w').show();
			jQuery( 'input[name="presentup_theme_options[titlebar_subheading_font][color]"]' ).closest('.tm-typography-font-color-w').show();
			jQuery( 'input[name="presentup_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.tm-typography-font-color-w').show();
		} else {
			jQuery( 'input[name="presentup_theme_options[titlebar_heading_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
			jQuery( 'input[name="presentup_theme_options[titlebar_subheading_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
			jQuery( 'input[name="presentup_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
		}
	}
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_heading_font][color]"]' ).closest('.tm-typography-font-color-w').show();
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_subheading_font][color]"]' ).closest('.tm-typography-font-color-w').show();
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.tm-typography-font-color-w').show();
			
		} else {
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_heading_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_subheading_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.tm-typography-font-color-w').hide();
		}
	}
	
	
}
  
  
  
  
  
/**
 *  Titlebar bg custom color show/hide
 */ 
function themetechmount_show_hide_titlebar_bgcolor(){
	
	var $page_this = jQuery( 'select[name="_themetechmount_metabox_group[titlebar_bg_color]"]' );
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_background][color]"]' ).closest('.tm-background-color-w').show();
		} else {
			jQuery( 'input[name="_themetechmount_metabox_group[titlebar_background][color]"]' ).closest('.tm-background-color-w').hide();
		}
	}
	
	
}





/**
 *  ThemetechMount icon picker
 */
function themetechmount_icon_picker(){
	
	if( jQuery('.themetechmount-iconpicker-wrapper').length > 0 ){
		
		jQuery('.themetechmount-iconpicker-wrapper').each(function(){
			
			var mainwrapper = jQuery(this);
			
			// checking if iconpicker already applied
			if( jQuery('.themetechmount-iconpicker-list', mainwrapper ).hasClass('iconpicker') == false ){
				
				// check if click applied
				if( !jQuery( '.tm-ipicker-selector-button', mainwrapper ).hasClass('tm_click_applied') ){
					
					jQuery( '.tm-ipicker-selector-button', mainwrapper ).on('click', function(){
						
						var $btn = jQuery(this);
						if( jQuery( '.themetechmount-iconpicker-list-w', mainwrapper ).css('display')=='none' ){
							
							
							// Apply iconpicker() on click so it will not load the page
							if( !jQuery('.themetechmount-iconpicker-list', mainwrapper ).hasClass('iconpicker') ){
								
								jQuery('.themetechmount-iconpicker-list', mainwrapper ).iconpicker({
									align: 'left', // Only in div tag
									arrowPrevIconClass: 'fa fa-chevron-left',
									arrowNextIconClass: 'fa fa-chevron-right',
									cols: 8,
									icon: jQuery('.themetechmount-iconpicker-list', mainwrapper ).data('icon'),
									iconset: jQuery('.themetechmount-iconpicker-list', mainwrapper ).data('iconset'),
									rows: 5
								});
								jQuery('.themetechmount-iconpicker-list', mainwrapper ).on('change', function(e) {
									jQuery('.tm-ipicker-selected-icon i',mainwrapper).removeClass().addClass( e.icon );
									jQuery('.themetechmount-iconpicker-input',mainwrapper).val(e.icon);
								});
								
							}
							
							jQuery( '.themetechmount-iconpicker-list-w', mainwrapper ).slideDown();
							jQuery( '.tm-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-down').addClass('fa-arrow-up');
						} else {
							jQuery( '.themetechmount-iconpicker-list-w', mainwrapper ).slideUp();
							jQuery( '.tm-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-up').addClass('fa-arrow-down');
						}
						return false;
					});
					
					
					// adding class so no other click applied
					jQuery( '.tm-ipicker-selector-button', mainwrapper ).addClass('tm_click_applied');
					
				}
			
			
				
				// close when click outside
				jQuery(document).on('click', function(event) { 
					if(!jQuery(event.target).closest('.themetechmount-iconpicker-list-w', mainwrapper ).length) {
						if(jQuery('.themetechmount-iconpicker-list-w', mainwrapper).is(":visible")) {
							jQuery( '.tm-ipicker-selector-button', mainwrapper ).trigger('click');
						}
					}
				});
				
			}
			
		});
		
		
		
		
		
		jQuery('.tm-ipicker-selector-w' ).each(function(){
			
			// specially for CodeStar element only
			if( jQuery('.themetechmount-iconpicker-element').length > 0 ){
				jQuery('.themetechmount-iconpicker-element').each(function(){
					var wrapper2 = jQuery(this);
					jQuery('.tm-iconpicker-library-selector', wrapper2 ).on('change', function(e){
						
						var curr_library = jQuery('.tm-iconpicker-library-selector', wrapper2).val();
						
						jQuery('.themetechmount-iconpicker-wrapper', wrapper2).each(function(){
							jQuery(this).hide();
							jQuery('.themetechmount-iconpicker-wrapper.tm-iconpicker-'+curr_library, wrapper2).show();
						});
						
					});
					
				});
			};
			
			
			
		});

	}
}
 
 

 
 
 
 
 
 
/**
 *  This is for background with custom color dropdown.. This will will show/hide color picker from the background options.
 */
function themetechmount_show_hide_color_picker_background(){
	
	
	var items = [
		/* ['dropdown_id',         'background_id'], */
		['fbar_bg_color',          'fbar_background'],
		['titlebar_bg_color',      'titlebar_background'],
		['full_footer_bg_color',   'full_footer_bg_all'],
		['first_footer_bg_color',  'first_footer_bg_all'],
		['second_footer_bg_color', 'second_footer_bg_all'],
		['bottom_footer_bg_color', 'bottom_footer_bg_all']
	];
	
	jQuery(items).each(function(n,val){
		
		var dropdown_name   = val[0];
		var background_name = val[1];
		
		var $dropdown_element   = jQuery( 'select[name="presentup_theme_options['+dropdown_name+']"]' );
		
		// show/hide the color picker on load
		if( $dropdown_element.val()=='custom' ){
			jQuery( 'input[name="presentup_theme_options['+background_name+'][color]"]' ).closest('.tm-background-color-w').show();
		} else {
			jQuery( 'input[name="presentup_theme_options['+background_name+'][color]"]' ).closest('.tm-background-color-w').hide();
		}
		
		// on change of the dropdown
		$dropdown_element.change(function() {  // Theme Options
			
			if( jQuery(this).val()=='custom' ){
				jQuery( 'input[name="presentup_theme_options['+background_name+'][color]"]' ).closest('.tm-background-color-w').show();
			} else {
				jQuery( 'input[name="presentup_theme_options['+background_name+'][color]"]' ).closest('.tm-background-color-w').hide();
			}
		});
		
	});
	
}



  




/**
 *  Blog Post Format - Move the Gallery Meta Box to the Gallery Tab content so user can select images directly from Gallery tab.
 */
function themetechmount_gallery_post_format(){
	// moving the gallery meta box after the gallery box
	jQuery("#cfpf-format-gallery-preview").after( jQuery("#_themetechmount_metabox_gallery") );
	
	// hide all box by defualt
	jQuery("#_themetechmount_metabox_gallery").hide();
	
	jQuery("#cfpf-format-gallery-preview").hide();
	jQuery( '#cfpf-format-gallery-preview > label' ).hide();
	jQuery( '#cfpf-format-gallery-preview > .cfpf-gallery-options' ).hide();
	
	
	// show/hide if gallery post format
	if( jQuery('input[name="post_format"]:checked').val() == 'gallery' ){
		jQuery("#_themetechmount_metabox_gallery").show();
	}
	
	
	
	jQuery('input[name="post_format"]').change(function() {
		console.log( 'Changed: ' + this.value );
		
		if( this.value == 'gallery' ){
			jQuery("#_themetechmount_metabox_gallery").show();
		} else {
			jQuery("#_themetechmount_metabox_gallery").hide();
		}
		
	});

}






/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {
	
	// stickey header in theme options
	jQuery(".cs-header").stick_in_parent();
	
	// Icon picker in CodeStar framework
	themetechmount_icon_picker();
	
	// When clicking on add group button and the group contains icon picker in it. Specially created for Portfolio List
	jQuery('.cs-field-group').each(function(){
		var groups = jQuery(this);
		jQuery( '.cs-add-group', groups ).on('click', function(){
			setTimeout(function(){
				jQuery('.cs-group:last-child .themetechmount-iconpicker-list', groups ).removeClass('iconpicker');
				themetechmount_icon_picker();
			}, 10);
		});
	});
	
	
	
	jQuery('.cs-field-themetechmount_background', this).TM_CSFRAMEWORK_BG_IMAGE_UPLOADER();
	jQuery('.cs-field-themetechmount_typography', this).TM_CSFRAMEWORK_TYPOGRAPHY();
	jQuery('.cs-field-themetechmount_image', this).TM_CSFRAMEWORK_IMAGE_UPLOADER();
	
	
	
	// Titlebar Text Color - Show / Hide color for Text color option
	themetechmount_show_hide_titlebar_textcolor();
	jQuery( 'select[name="presentup_theme_options[titlebar_text_color]"]' ).change(function() {  // Theme Options
		themetechmount_show_hide_titlebar_textcolor();
	});
	jQuery( 'select[name="_themetechmount_metabox_group[titlebar_text_color]"]' ).change(function() {  // Page Meta Box Option
		themetechmount_show_hide_titlebar_textcolor();
	});
	
	
	// Titlebar BG Color - Show / Hide color for bg color option
	themetechmount_show_hide_titlebar_bgcolor()
	jQuery( 'select[name="_themetechmount_metabox_group[titlebar_bg_color]"]' ).change(function() {  // Page Meta Box Option
		themetechmount_show_hide_titlebar_bgcolor();
	});
	


	/**
	 *  Codestar Framework : themetechmount_skin_color JS
	 */
	jQuery('.cs-field-themetechmount_skin_color').each(function(){
		var $this = jQuery(this);
		jQuery( '.themetechmount-skin-color-list a', $this ).on('click', function() {
			var color = jQuery(this).css('background-color');
			jQuery('.wp-color-picker', $this ).iris('color', color);
			return false;
		});
	});
	
	
	/**
	 *  Add class in page loading option
	 */
	jQuery('*[data-depend-id="loaderimg_1"]').closest('.cs-field-image-select').addClass('tm-pre-loader-option-wrapper');
	jQuery('input[type=radio][name="presentup_theme_options[loaderimg]"]:checked').closest('label').addClass('tm-pre-loader-option-selected');
	jQuery('input[type=radio][name="presentup_theme_options[loaderimg]"]').change(function() {
		jQuery('input[type=radio][name="presentup_theme_options[loaderimg]"]').closest('label').removeClass('tm-pre-loader-option-selected');
		jQuery(this).closest('label').addClass('tm-pre-loader-option-selected');
		return true;
	});
	
	
	// Post formats - Move Gallery meta box in Gallery tab 
	themetechmount_gallery_post_format();
	
	
	
		
	/**
	 *  Icon picker init on adding new group in TM Progress Bar
	 */
	if (typeof vc != 'undefined' && typeof vc.atts != 'undefined' ) {
		vc.atts.themetechmount_iconpicker = {
			init: function ( param, $wrapper ) {
				themetechmount_icon_picker();
			}
		};
	}
	
	// on ajax complete
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		themetechmount_icon_picker();
	});
	
	
	/* For all background options - linking dropdown with all color picker for CUSTOM option.. so the color picker will be visiable only when custom color is selected */
	themetechmount_show_hide_color_picker_background();
	
	
	
	
});  // document.ready






/**
 *  Window Load init
 */
jQuery( window ).load(function() {
	
	// Header Styles - change values of some options on change of the header style
	themetechmount_header_style_change_triggers();
	
	
	// Post formats - Open Gallery meta box if closed
	if( jQuery(".js #_themetechmount_metabox_gallery").hasClass('closed') ){
		jQuery(".js #_themetechmount_metabox_gallery button.handlediv").trigger('click');
	}
	
	// Codestar - Remove DISABLED and adding READONLY to the export textarea
	jQuery('textarea[name="_nonce"]').prop("readonly", true);
	jQuery('textarea[name="_nonce"]').removeAttr('disabled');

});  // window.load


