<?php $themetechmount_header_menuarea_height = themetechmount_header_menuarea_height(); ?>

.headerlogo,
.tm-header-icon, 
.site-header .themetechmount-fbar-btn{
    height: <?php echo esc_attr($header_height); ?>px;
    line-height: <?php echo esc_attr($header_height); ?>px !important;
}


@keyframes menu_sticky {
	0%   {margin-top:-120px;opacity: 0;}
	50%  {margin-top: -64px;opacity: 0;}
	100% {margin-top: 0;opacity: 1;}
}


/**
* Responsive Menu
* ----------------------------------------------------------------------------
*/
@media (max-width: <?php echo esc_attr($breakpoint); ?>px){
	/* Responsive Header bg color */
	<?php if( !empty($responsive_header_bg_custom_color) ) : ?>
	.tm-header-overlay #site-header.site-header.tm-bgcolor-custom{
		background-color: <?php echo esc_attr($responsive_header_bg_custom_color); ?> !important;
	}
	<?php endif; ?>	
	
	/*** Header Section ***/
	.site-header-main.tm-wrap{
		margin: 0 30px 0 25px;
		width: auto;
		display: block;
	}	
	.site-header-main.tm-wrap .tm-wrap-cell {
		display: block;		
	}	
    .tm-header-icon{
        padding-right: 0px;
        padding-left: 10px;
        position: relative;
    } 
	.tm-header-icon.tm-header-wc-cart-link{
    	float: right;
    }   
	.tm-header-icon.tm-header-search-link{
    	float: left;
    } 
    .site-title{
        width: inherit;
        margin: 0 auto;
    }  
	div.tm-titlebar-wrapper {
	    background-attachment: scroll !important;	
	}
 	
    /*** Navigation ***/
    .main-navigation {
    	clear: both;
    }    
   	.site-branding,
    #site-header-menu #site-navigation li.mega-menu-megamenu > ul.mega-sub-menu,
    #site-header-menu #site-navigation div.mega-menu-wrap,
	.menu-tm-main-menu-container,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu,
	#site-header-menu {
		float: none;	
    }
	
    /*** Responsive Menu ***/    
    .righticon{
        position: absolute;
        right: 0px;
        z-index: 33;
        top: 15px;
        display: block;
    }    
	.righticon i{
		font-size:20px;
		cursor:pointer;
        display:block;
        line-height: 0px;
	} 
    /*** Default menu box ***/ 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal,
    #site-header-menu #site-navigation div.nav-menu > ul{
    	position: absolute;
        padding: 10px 20px; 
        left: 0px;	
        box-shadow: rgba(0, 0, 0, 0.12) 3px 3px 15px;
        border-top: 3px solid <?php echo esc_attr($skincolor); ?>;	 
        background-color: #333;       
        z-index: 100;
        width: 100%;
        top: <?php echo esc_attr($header_height); ?>px;  
    }  
    
    <?php if($headerbg_color=='custom' && !empty($headerbg_customcolor['rgba']) ) : ?>
       	#site-header-menu #site-navigation div.nav-menu > ul,
        #site-header-menu #site-navigation .mega-menu-wrap .mega-menu{
            background-color: <?php  echo esc_attr($headerbg_customcolor['rgba']); ?>;
        } 
	<?php endif; ?>
      
    <?php if( !empty($dropmenu_background['color']) ): ?>
    	.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
        #site-header-menu #site-navigation div.nav-menu > ul{
        	background-color: <?php echo esc_attr($dropmenu_background['color']); ?>;
        }    
    <?php endif; ?>      
 

    #site-header-menu #site-navigation div.nav-menu > ul,
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        overflow: hidden;
        max-height: 0px;
    }
	#site-header-menu #site-navigation div.nav-menu > ul ul ul{
    	max-height: none;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li{
    	position: relative;
        text-align: left;
    }    
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul{       
        display: block;
        max-height: 10000px;       
    }
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul ul.open {
    	max-height: 10000px;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap{
    	  position: inherit;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	width: 100%;
    }   
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-toggle-on > a, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a {
    	background: none !important;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
    	float: none;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li{
    	width: 100% !important;
        padding-bottom: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	padding-left:15px;        
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a {
    	padding-left: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu,
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	  background-color: transparent !important;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a,    
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
        display: block;
        padding: 15px 0px;        
        text-decoration: none;
        line-height: 18px;
        height: auto;
        line-height: 18px !important;
    }     
    #site-header-menu #site-navigation div.nav-menu > ul ul a, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item a {
        margin: 0;
        display: block;
        padding: 15px 15px 15px 0px;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li li a:before,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item li.mega-menu-item a:before{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        speak: none;
        display: inline-block;
        text-decoration: inherit;
        margin-right: .2em;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 13px;
        content: "\f105";
        margin-right: 8px;
        display: none;
    }         
    .tm-mmmenu-override-yes .mega-sub-menu {
     	display: none !important;
    }
    .mega-sub-menu.open, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li .mega-sub-menu .mega-sub-menu {
    	display: block !important;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li  {
        padding: 0px;
        padding-left: 0px;
    }  
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
    	margin-top:30px;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item:first-child > h4.mega-block-title{
    	margin-top: 0px;
    }      
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
   		position: relative;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a, 
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
    	display: inline-block;
    } 
 	
    /*** Defaultmenu ***/
    .tm-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover,
    
    .tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .tm-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
    	color: <?php echo esc_attr($skincolor); ?>;
    } 
	
   <?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($skincolor); ?>;
    }
    <?php } ?>
	
    <?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
     /* Main Menu Active Link Color --------------------------------*/        
    .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .tm-mmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover{
         color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
     }
    <?php } ?> 
    

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>      
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
        color: <?php echo esc_attr($skincolor); ?>;
    }    
    <?php } ?>    
 
    
    <?php if( !empty($dropdownmenufont['color']) ): ?>
    #site-header-menu #site-navigation div.nav-menu > ul > li > a,     
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a,    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget,
    .righticon i  {
    	color: rgba( <?php echo themetechmount_hex2rgb($dropdownmenufont['color']); ?> , 1);
    } 
    #site-header-menu #site-navigation div.nav-menu > ul li,
  	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li {
    	border-bottom: 1px solid rgba( <?php echo themetechmount_hex2rgb($dropdownmenufont['color']); ?> , 0.15);
    }  
    #site-header-menu #site-navigation div.nav-menu > ul li li:last-child,
  	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:last-child{
    	border-bottom: none;
    }     
    <?php endif; ?>    
    

	/* Dynamic main menu color applying to responsive menu link text */   

    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label-open,
    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label .mega-toggle-label-closed{
        display: none;
    }    


    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1{
        margin-top: 10px
    }

    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-blocks-right{
        height: 30px;
    }


    .menu-toggle i,     
    .tm-header-icons a{
		color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}            
    .menu-toggle span,
    .menu-toggle span:after,
    .menu-toggle span:before{
    	background-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }	
    #site-header-menu #site-navigation div.nav-menu > ul{
        padding-right: 15px;
        padding-left: 15px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	list-style: none;
    }      
    .tm-header-icons{
        position: absolute;
        top: 0;
        float: none;
        right: 0px;
        margin-right: 0px;
    }   
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu.open, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{       
        display: block !important;
        height: auto !important;  
    }    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
        opacity: 1;   
    }    
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        background-image: none !important;      
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
    	margin-top: 0;
    }      
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a.mega-menu-link{
    	background: none;
        background-image: none;
    }    
    .tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{
    	padding-top: 0px;
    }  

    #site-header-menu #site-navigation .menu-toggle,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-20); ?>px;
        display: block;
        position: absolute; 
        left: 0;       
        width: 40px;       
        background: none;
        z-index: 1;
        outline: none;
        padding: 0;
        line-height: normal;
    }    
    .tm-header-invert #site-header-menu #site-navigation .menu-toggle,
    .tm-header-invert .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        right: 0; 
        left: auto;
    }    
    .tm-header-invert .tm-header-icons {
        left: 0;
        right: auto;
    }    
    #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-right{
        float: none;
    }    
    #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1 {
        display: inline-block;
		width: 30px;
        height: 2.5px;
        background: #ecf0f1;
        border-radius: 3px;
        transition: 0.3s;
        position: relative;
    }
    #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before {
        top: 9px;
    }
    #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        top: -9px;
    }    
    #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before, 
    #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after,
    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        display: inline-block;
		width: 30px;
		height: 2px;
        background: #ecf0f1;
        border-radius: 3px;
        transition: 0.3s;
        position: absolute;
        left: 0;
        content: '';
        -webkit-transform-origin: 0.28571rem center;
        transform-origin: 0.28571rem center;
        margin: 0;
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars,     
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1 {
        background: transparent;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars:before,
    #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars:after,
    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        top: 0;
        width: 30px;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars:before,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before {
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars:after,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
    }   
    
    /*** Responsive icon color( If custom header background color ) ***/      
    /* White color */ 

    .tm-header-highlight-logo .site-header.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .tm-header-highlight-logo .site-header.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .tm-header-highlight-logo .site-header.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,  

    .tm-header-highlight-logo #site-header.site-header #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars,
    .tm-header-highlight-logo #site-header.site-header #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before, 
    .tm-header-highlight-logo #site-header.site-header #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after,
	
    .site-header.tm-bgcolor-skincolor .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.tm-bgcolor-skincolor .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.tm-bgcolor-skincolor .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,  
     
    .site-header.tm-bgcolor-darkgrey .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.tm-bgcolor-darkgrey .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.tm-bgcolor-darkgrey .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,      
	.tm-responsive-icon-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .tm-responsive-icon-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .tm-responsive-icon-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
    .tm-responsive-icon-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars,
    .tm-responsive-icon-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before, 
    .tm-responsive-icon-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after{
         background-color: #fff;
    }



    .site-header .tm-header-icons .tm-header-wc-cart-link a, 
    .site-header .tm-header-icons .tm-header-search-link a,
    .site-header.tm-bgcolor-skincolor .menu-toggle i, 
    .site-header.tm-bgcolor-skincolor .tm-header-icons a,
    .site-header.tm-bgcolor-darkgrey .menu-toggle i, 
    .site-header.tm-bgcolor-darkgrey .tm-header-icons a,     
    .tm-responsive-icon-white .menu-toggle i, 
    .tm-responsive-icon-white .tm-header-icons a {
    	color: #fff;
    }      


    /* Dark color */  
    .site-header.tm-bgcolor-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars,
    .site-header.tm-bgcolor-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before,
    .site-header.tm-bgcolor-white #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after,     
      
    .site-header.tm-bgcolor-grey.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.tm-bgcolor-grey.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.tm-bgcolor-grey.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,         
      
    .tm-bgcolor-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .tm-bgcolor-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .tm-bgcolor-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,        
    
	.tm-responsive-icon-dark.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .tm-responsive-icon-dark.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .tm-responsive-icon-dark.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,

    .tm-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars,
    .tm-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:before, 
    .tm-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .tm-presentup-icon-bars:after{
         background-color: #262626;
    }      
    
    .site-header.tm-bgcolor-grey .menu-toggle i, 
    .site-header.tm-bgcolor-grey .tm-header-icons a,  
    
    .site-header.tm-bgcolor-white .menu-toggle i, 
    
    .tm-responsive-icon-dark .menu-toggle i, 
    .tm-responsive-icon-dark .tm-header-icons a {
    	color: #262626;
    }      
    
    .tm-responsive-icon-white #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars,
    .tm-responsive-icon-dark #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars,

    .site-header.tm-bgcolor-white #site-header-menu #site-navigation.toggled-on .menu-toggle .tm-presentup-icon-bars,
    .site-header.tm-bgcolor-darkgrey #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.tm-bgcolor-skincolor #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    
    .site-header.tm-bgcolor-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.tm-bgcolor-grey.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    
    .tm-responsive-icon-dark.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .tm-responsive-icon-white.tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1{
    	background-color: transparent;
    } 
    
    /* Display None */
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:after,
    #site-header-menu #site-navigation div.nav-menu > ul{
    	display: none;
    }
    .tm-header-style-toplogo .tm-stickable-header-w{
    	height: auto !important;
    }    
    
    /* tm-header-style-infostack */     
    .tm-header-style-infostack .tm-header-icon.tm-header-btn-w,
    .tm-header-style-infostack .tm-header-widgets-wrapper{
    	display: none;    
    }  

	body.themetechmount-page-full-width.tm-titlebar-bcrumb-bottom #content .site-main .entry-content > .wpb_row:first-child {
		margin-top: -82px;
	}

    .tm-header-style-toplogo .tm-stickable-header-w,
    .tm-header-style-infostack.tm-header-overlay .tm-stickable-header-w{        
        top: 0;
    }
    .tm-header-style-infostack .tm-header-top-wrapper .col-sm-4.col-md-3,
    .tm-header-style-infostack .kw-phone{
        display: none;
    }
    .tm-header-style-infostack .site-header-menu{
        display: block;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .tm-header-style-infostack .tm-header-top-wrapper .col-sm-4.col-md-6{
        margin: 0 auto;
        float: none;
    }
    .tm-header-style-infostack .headerlogo{
        height: <?php echo esc_attr($header_height) - ($themetechmount_header_menuarea_height/2); ?>px;
        line-height: <?php echo esc_attr($header_height) - ($themetechmount_header_menuarea_height/2); ?>px !important;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation .menu-toggle,
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
       top: <?php echo (esc_attr($header_height/2) - ($themetechmount_header_menuarea_height/2)-3.5); ?>px; 
    }

    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul {
        top: <?php echo esc_attr($header_height) - ($themetechmount_header_menuarea_height/2); ?>px;
    }
	.tm-header-style-infostack .site-header-menu {
		left: 0;
	}
	.tm-header-style-infostack .tm-stickable-header-w,
	.tm-header-style-infostack .tm-site-header-menu {
		height: auto !important;
	}
    #site-header-menu #site-navigation .menu-toggle,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-16); ?>px;
    }	
	.tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar-main > .container .tm-titlebar-main-inner .entry-title-wrapper,
	.tm-header-style-infostack .tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar-main > .container .tm-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -54px;	
	}
	
	/* sticky footer bottom margin */	
	body .site-content-wrapper {
		margin-bottom: 0px !important;
	}
	.entry-title-wrapper .entry-title:before {
		content: none;
	}
	.tm-titlebar-align-left .entry-title-wrapper .entry-title {
		padding-left: 0px;
	}
	.tm-header-style-infostack .tm-top-info-con {
		display:none;
	}
	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		<?php if( !empty($dropmenu_background['color']) && $dropmenu_background['color']=='#ffffff' && $mainmenu_active_link_color=='custom' && $mainmenu_active_link_custom_color=='#ffffff' ): ?>
		/* Main Menu Active Link Color --------------------------------*/                
		.tm-header-style-infostack .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
		.tm-header-style-infostack .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.tm-header-style-infostack .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
		.tm-header-style-infostack .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
		.tm-header-style-infostack .tm-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
		.tm-header-style-infostack .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.tm-header-style-infostack .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
		.tm-header-style-infostack .tm-mmenu-active-color-custom  .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		.tm-header-style-infostack .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,
		.tm-header-style-infostack .tm-mmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		<?php endif; ?> 
	<?php } ?>
	.tm-header-style-infostack #site-header-menu .container {
       width: auto;
		display: block;
	}
	#mega-menu-wrap-tm-main-menu #mega-menu-tm-main-menu li.mega-menu-item-has-children.mega-toggle-on > a.mega-menu-link > span.mega-indicator {
		display: none;
	}
	.k_flying_searchform_wrapper {
		position: absolute;
		width: 100%;
		z-index: 33;
	}
}

@media (min-width: <?php echo esc_attr($breakpoint); ?>px) {
    header #site-header-menu #site-navigation{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }

	/* Header full */
    .tm-header-overlay .tm-stickable-header-w{
        position: absolute;
        z-index: 21;
        width: 100%;
        box-shadow: none;
        -khtml-box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    } 
	.site-header-main.container-full {
		padding: 0 50px;
	}
	.tm-stickable-header.is_stuck{    	 
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.06);
    } 
    .tm-stickable-header{
        z-index: 12;      
    }
	.tm-header-icon, 
	.tm-header-icons, 
    .themetechmount-fbar-btn,
   	.tm-header-icons .themetechmount-fbar-btn a i,
	.headerlogo, 
    #site-header-menu #site-navigation div.nav-menu > ul,
	#site-header-menu #site-navigation div.nav-menu > ul > li, 
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li, 
	#site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
	.tm-main-menu-more-than-six #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.tm-main-menu-more-than-six .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		margin: 0px 10px 0px 10px;
	}
    .tm-header-icon{       
        position: relative;
    }
    #site-header-menu #site-navigation .nav-menu,  
    #site-header-menu, 
    .tm-header-icons, 
    .tm-header-icon,
    #site-header-menu #site-navigation .mega-menu-wrap, 
    .menu-tm-main-menu-container{
    	float: right;
    }    
	.navbar{
        vertical-align: top;
    }
    .menu-toggle {
        display: none;
        z-index: 10;	
    }
    .menu-toggle i{
        color:#fff;
        font-size:28px;
    }
    .toggled-on li, 
    .toggled-on .children {
        display: block;
    }		
    #site-header-menu #site-navigation div.mega-menu-wrap{
        clear: none;
        position: inherit;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
        position: static !important;       
    }
  
    #site-header-menu #site-navigation .nav-menu-wrapper > ul {
        margin: 0;
        padding: 0; 
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a{
    	background: none;
    } 
	#site-header-menu #site-navigation div.nav-menu > ul{
    	margin: 0px;
    }   
	.k_flying_searchform_wrapper {
        top: auto;
        position: absolute;
        width: 100%;
        left: 0;
        right: 0;
        z-index: 11;
    }
	.tm-header-style-infostack .k_flying_searchform_wrapper,
	.tm-header-style-classic-box .k_flying_searchform_wrapper {
		max-width: 1140px;
		left: 0;
		right: 0;
		margin-left: auto;
		margin-right: auto;
	}	
	.tm-header-style-infostack .tm-stickable-header:not(.is_stuck) .k_flying_searchform_wrapper {
		top:<?php echo (themetechmount_header_menuarea_height()); ?>px;	
	}
	.tm-header-style-infostack .tm-stickable-header:not(.is_stuck) .k_flying_searchform_wrapper .container,
	.tm-header-style-classic-box .tm-stickable-header:not(.is_stuck) .k_flying_searchform_wrapper .container {
		width: 1140px;
	}
	
	.tm-header-style-infostack .tm-stickable-header.is_stuck .k_flying_searchform_wrapper,
	.tm-header-style-classic-box .tm-stickable-header.is_stuck .k_flying_searchform_wrapper {
		width: 100%;
		max-width: 100%;
	}
	
    #site-header-menu #site-navigation div.nav-menu > ul > li,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }  
    #site-header-menu #site-navigation div.nav-menu > ul > li {
        margin: 0 0px 0 0;
        display: inline-block;
        position: relative;
		vertical-align: top;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	display: block;	
        margin: 0px 17px 0px 17px;
        padding:  0px; 
        text-decoration: none;
        position: relative;
        z-index: 1;       
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;        
    } 

	#site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
		width: 100%;
		height: 2px;
		display: block;
		opacity: 0 ;
		position: absolute;
		content: "";
		background-color: <?php echo esc_attr($skincolor); ?> ;
		opacity: 0;
		-webkit-transition: all 0.25s ease-out;
		transition: all 0.25s ease-out;
		top:<?php echo esc_attr(ceil($header_height/2)+22); ?>px;
		margin: 0 auto -2px;
		left: 0;
	} 
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
	.is_stuck.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
		top: <?php echo ceil($header_height_sticky/2)+20; ?>px;
	}     
    #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
       	top: <?php echo esc_attr(ceil($header_height/2)+17); ?>px;
		opacity: 1;
    }   
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
	.is_stuck.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before {
		top: <?php echo ceil($header_height_sticky/2)+15; ?>px;
	}    
	
    /*** Defaultmenu ***/ 
	.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li ul a:before,
	.tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before,
    .tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,    
    .tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .tm-mmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($skincolor); ?> ;
    }
	
	#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
		background-color: <?php echo esc_attr($skincolor); ?>;	
	}	
    
	#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item, 
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item,
	#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item, 
	.tm-search-overlay .w-search-form-row:before {
		border-bottom-color: <?php echo esc_attr($skincolor); ?>;		
	}
	.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
	.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,
	.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
		background-color: #fff;;	
	}	

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        .tm-mmenu-active-color-custom .tm-header-icons .themetechmount-fbar-btn a:hover,
    	.tm-mmenu-active-color-custom .site-header .social-icons li > a:hover, 
        .tm-mmenu-active-color-custom .tm-header-icons .tm-header-search-link a:hover, 
        .tm-mmenu-active-color-custom .tm-header-icons .tm-header-wc-cart-link a:hover,        
        .tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,
    	.tm-mmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a{
        	color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?> ;
        }        
		.tm-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
		.tm-mmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
			background-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 0.90) ;
			
        }    
        
    <?php } ?>
    
	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>        
    /* Dropdown Menu Active Link Color -------------------------------- */ 
	tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li ul a:before,
	tm-dmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li ul a:before,	
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,  
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a, 
    .tm-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li:hover > a,
    .tm-dmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a, 				
    .tm-mmenu-active-color-custom .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>   
    

    #site-header-menu #site-navigation div.nav-menu > ul > li > a{
        margin: 0px 17px 0px 17px;
    }
    .is_stuck .tm-header-icons .themetechmount-fbar-btn a,   	
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .is_stuck.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    
	 #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .tm-mmmenu-override-yes #site-header-menu .is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	
    #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .tm-mmmenu-override-yes #site-header-menu.is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	color: <?php echo esc_attr($stickymainmenufontcolor); ?>;
    }  
	
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	#site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
        background: <?php echo esc_attr($skincolor); ?>;
    }
	
	 .tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	.tm-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .tm-dmenu-active-color-skin .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
       background-color: #fff;
    }
	
    .site-header .social-icons li > a,
    .tm-header-icons .themetechmount-fbar-btn a{
    	color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-icons .tm-header-search-link a,  
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-icons .tm-header-wc-cart-link a,
	.tm-header-style-infostack .tm-header-menu-bg-color-darkgrey .tm-header-icons .tm-header-search-link a,  
	.tm-header-style-infostack .tm-header-menu-bg-color-darkgrey .tm-header-icons .tm-header-wc-cart-link a{
		border-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 0.70) ;
	}
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-icons .tm-header-search-link a {
		background-color: #012546;
	}
    .site-header .social-icons li > a:hover,
	.tm-header-icons .tm-header-wc-cart-link a:hover{
    	color: <?php echo esc_attr($skincolor); ?> ;
    }
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-icons .tm-header-search-link a:hover,  
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-icons .tm-header-wc-cart-link a:hover,
	.tm-header-style-infostack .tm-header-menu-bg-color-darkgrey .tm-header-icons .tm-header-search-link a:hover,  
	.tm-header-style-infostack .tm-header-menu-bg-color-darkgrey .tm-header-icons .tm-header-wc-cart-link a:hover {
		border-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}

	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .tm-header-wc-cart-link a span.number-cart,
	.tm-header-style-infostack .tm-header-menu-bg-color-darkgrey.is_stuck .tm-header-wc-cart-link a span.number-cart,
    .tm-header-style-infostack .tm-header-menu-bg-color-skincolor.is_stuck .tm-header-wc-cart-link a span.number-cart{
		background-color:#fff;
		color: <?php echo esc_attr($skincolor); ?> ;
	}
	.tm-header-style-infostack .site-header .tm-header-menu-bg-color-darkgrey .tm-header-wc-cart-link a:hover span.number-cart,
	.tm-header-style-infostack .site-header .tm-sticky-bgcolor-darkgrey.is_stuck .tm-header-wc-cart-link a:hover span.number-cart{
		color:#fff;
		background-color:<?php echo esc_attr($skincolor); ?> ;
	}
	.tm-header-icons:before {
		display: block;
		content: "";
		position: absolute;
		height: 30px;
		width: 1px;
		left: -2px;
		top: 50%;
		margin-top: -13px;
		background-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> ,0.23) ;
	}
	.tm-header-style-classic-box .tm-header-icons:before,
	.tm-header-style-classic-highlight .tm-header-icons:before {
		background-color: rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> ,0.15) ;
	}
	.tm-header-style-classic-box .is_stuck .tm-header-icons:before,
	.tm-header-style-classic-highlight .is_stuck .tm-header-icons:before {
		background-color: rgba( <?php echo themetechmount_hex2rgb($stickymainmenufontcolor); ?> ,0.15) ;	
	}
	.is_stuck .tm-header-icons:before {
		background-color: rgba( <?php echo themetechmount_hex2rgb($stickymainmenufontcolor); ?> ,0.23) ;	
	}
	
    /*** Sub Navigation Section ***/
	
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
		box-shadow: 0 3px 25px 0px rgba(0,0,0,.07), 0 0 0 rgba(0,0,0,.10) inset;
    }
	
    header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu,
    header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu,
    header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu{
        left: auto;
        right: 0px !important;
    }    
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.sub-menu ul.sub-menu,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.sub-menu ul.sub-menu, 	 	
    
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.children ul.children, 
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.children ul.children,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.children ul.children,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.children ul.children,
	
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu ul.mega-sub-menu,
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu ul.mega-sub-menu{
    	left: -100%;
    }            
    #site-header-menu #site-navigation div.nav-menu > ul ul,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu {
        width: 260px;
        padding: 0px;
    }       
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a {
        margin: 0;
        display: block;
        padding: 16px 20px;
        position: relative;         
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
        padding: 16px 0px 16px 20px;
    }   
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a{
        -webkit-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
        padding: 0px;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child{
    	border-right: none;
    }          
    #site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
        opacity: 1;
        display: block;
        visibility: visible;
        height: auto;
    } 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
	#site-header-menu #site-navigation div.nav-menu > ul li > ul ul  {
        border-left: 0;
        left: 100%;
        top: 0px;        
    }
    #site-header-menu #site-navigation ul ul li {
    	position: relative;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul {
    	text-align: left;
        position: absolute;
        visibility: hidden;
        display: block;
        opacity: 0; 
        line-height: 14px;        
        margin: 0;
        list-style: none;
        left: 0;        
        border-radius: 0;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        transition: all .2s ease;
        z-index: 99;
    }

    /*** Sep Section ***/
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        content: ' ';
        display: block;
        width: 30px;
        height: 1000px;
        right: 0px;
        top: 0;
        position: absolute;
        border-right: 1px solid transparent;
    } 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
    	border-bottom: 1px solid transparent;
    }
	 #site-header-menu #site-navigation div.nav-menu ul ul > li:last-child, 
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li:last-child{
        border-bottom: none !important;
    }

    .tm-dmenu-sep-grey .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: rgba(0,0,0,0.10);
    } 
    .tm-dmenu-sep-grey .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .tm-dmenu-sep-grey #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .tm-dmenu-sep-grey .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .tm-dmenu-sep-grey .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(0, 0, 0, 0.08);
    }
    .tm-dmenu-sep-white .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: rgba(255,255,255,0.10);
    } 
    .tm-dmenu-sep-white .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .tm-dmenu-sep-white #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .tm-dmenu-sep-white .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .tm-dmenu-sep-white .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(255, 255, 255, 0.10);
    }
    
    /*** Sticky Header Height ***/ 
    header .tm-header-highlight-logo .is_stuck #site-header-menu,
    header .is_stuck #site-header-menu #site-navigation,    
    .is_stuck .headerlogo,
    .is_stuck .themetechmount-fbar-btn,  
    .is_stuck .tm-header-icon,
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
    .is_stuck.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li,    
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .is_stuck.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
    }
    
    /*** Sub Navigation menu ***/ 
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > ul,
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        border-top: none;
    }  


	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{
        padding: 0px;
        margin: 0px;
        width: calc(100% - 0px);       
	}    
    .tm-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu {
        overflow: hidden;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child:after {
    	border-right: none;
    }  
   
    /*** Sticky Sub Navigation menu ***/
    .is_stuck  #site-header-menu #site-navigation div.nav-menu > ul > li > ul, 
    .is_stuck.tm-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: <?php echo esc_attr($header_height_sticky); ?>px;
    } 
	
    /*** Header height ***/
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle + label{
        top: <?php echo esc_attr(ceil($header_height/2)); ?>px;
    }  
    .site-header-main.container-fullwide{
    	padding-left: 30px;
        padding-right: 0px;
    }    
    
	/*** Header Icon border ***/
	.tm-header-icons{	
		position: relative;
        height: <?php echo esc_attr($header_height); ?>px;
		padding-left: 10px;
    }       
	.is_stuck .tm-header-icons{	
		border-left-color: rgba( <?php echo themetechmount_hex2rgb($stickymainmenufontcolor); ?> , 0.15) ;
        height: <?php echo esc_attr($header_height_sticky); ?>px;
    }
	
	/*** Header Text Area ***/
    .tm-header-style-classic:not(.tm-header-invert) .container-fullwide #site-header-menu{
        margin-right:20px;
    }

	/*** Mega menu widget calendar ***/
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar caption {
		padding: 0px;
	}
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar .calendar_wrap {
		padding-top:10px;
	} 
    
    
    /*** Overlay Header ***/    
	
	.themetechmount-topbar-yes .tm-header-overlay .tm-stickable-header-w{
        top: 54px;
    }
    .tm-header-overlay .tm-stickable-header-w{
    	background-color: transparent;
    }
	.tm-header-overlay:not(.tm-header-style-classic-box) .themetechmount-topbar-wrapper {
		background-color: transparent;
	}
	.tm-header-overlay .themetechmount-topbar-wrapper.tm-bgcolor-darkgrey {
		border-bottom-color: rgba(255, 255, 255, 0.06);
	}
    .tm-header-overlay .site-header-menu.tm-bgcolor-darkgrey,   
    .tm-header-overlay .site-header.tm-bgcolor-darkgrey{
    	background-color: rgba(14, 56, 94, 0.87);
    }    
    .tm-header-overlay .site-header-menu.tm-bgcolor-grey, 
    .tm-header-overlay .site-header.tm-bgcolor-grey{
    	background-color: rgba(235, 235, 235, 0.38);
    }   
    .tm-header-overlay .site-header-menu.tm-bgcolor-white,
    .tm-header-overlay .site-header.tm-bgcolor-white{
    	background-color: rgba(255, 255, 255, 0.05);
    }
    .tm-header-overlay .site-header-menu.tm-bgcolor-skincolor,
    .tm-header-overlay .site-header.tm-bgcolor-skincolor{
    	background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.30);
    }    
    .tm-header-overlay .site-header-menu.tm-sticky-bgcolor-darkgrey.is_stuck{
    	background-color: #151515;
    }    
    .tm-header-overlay .site-header-menu.tm-sticky-bgcolor-grey.is_stuck{
    	background-color: #f5f5f5;
    }
    .tm-header-overlay .site-header-menu.tm-sticky-bgcolor-white.is_stuck{
    	background-color: #fff;
    }
    .tm-header-overlay .site-header-menu.tm-sticky-bgcolor-skincolor.is_stuck{
    	background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 1);
    } 
	.tm-header-overlay:not(.tm-header-style-classic-box) .tm-header-block > .themetechmount-topbar-wrapper {
		position: absolute;
		z-index: 21;
		width: 100%;
		box-shadow: none;
		-khtml-box-shadow: none;
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		-ms-box-shadow: none;
		-o-box-shadow: none;
        height: 54px;
        top: 0px;	
	}
	.tm-header-overlay .themetechmount-topbar-inner {
		line-height: 54px;
	}
	
    
    /*** ThemetechMount Center Menu ***/ 	
	.tm-header-menu-position-center #site-header-menu{
		float: none;
	}
	.tm-header-menu-position-center #site-header-menu #site-navigation{
		text-align: center;
		width: 100%;
	}    
    .tm-header-menu-position-center #site-header-menu  #site-navigation .nav-menu,
	.tm-header-menu-position-center.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap {		
		float: none;
		right: 0;
		left: 0;
		text-align: center;      
	}	
	.tm-header-menu-position-center.tm-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {
		position: static !important;
		display: inline-block;
	}
	.tm-header-menu-position-center .site-header-menu.tm-wrap-cell{
		display: block;
	}
	.tm-header-menu-position-center .headerlogo, 
	.tm-header-menu-position-center .tm-header-icon{
		position: relative;
		z-index: 2;
	}
	
	/*** ThemetechMount Left Menu ***/ 	
	.tm-header-menu-position-left #site-header-menu{
		float: none;
		display: block;
    }
    .tm-header-menu-position-left #site-header-menu #site-navigation .nav-menu,
	.tm-header-menu-position-left #site-header-menu #site-navigation div.mega-menu-wrap {
		float: none;
	}
	.tm-header-menu-position-left .site-branding{	
		padding-right: 25px;
	}	
	
	/*** ThemetechMount Dropdown widht narrow ***/ 	
	.site-header-main.container-full #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{		
		max-width: 1200px;
		right: 0;
		left: -15px;
		margin: 0px auto;
	}
    	
	/* Header Social link */ 
    .site-header .themetechmount-social-links-wrapper{
    	float: right;
    }
    .site-header .social-icons {
        padding-top: 0;
        padding-bottom: 0;
    }

    /***  Tm Header Style Infostack ***/   
    .tm-header-style-infostack:not(.tm-header-invert) #site-header-menu #site-navigation .nav-menu{
    	float: left;
		margin-right: 50px;
	}   
    .tm-header-style-infostack  #site-header-menu{
    	float: none;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li{
        vertical-align: top;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a { 
        margin: 0px 22px 0px 22px;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a:before, 
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
        top: <?php echo (themetechmount_header_menuarea_height() / 2 + 22); ?>px;	
    }
	.tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
        top: <?php echo (themetechmount_header_menuarea_height() / 2 + 15); ?>px;	
		opacity: 1;
    }   
	
	.tm-header-style-infostack .tm-header-top-wrapper .site-branding{
		float:left;
		text-align:left; 
		display:block;
		position: relative;
		z-index: 10;
	}
	.tm-header-style-infostack .tm-header-top-wrapper .headerlogo {
		position: relative;
	}
	.tm-header-style-infostack .tm-top-info-con{
    	display: block;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.mega-menu-wrap{
    	float: none;
    }    
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
    	top: auto;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }  
    .tm-header-style-infostack .header-content-main .header-content,
    .tm-header-style-infostack .header-content-main .header-icon{
        display: table-cell;
        vertical-align: middle;
    }
    .tm-header-style-infostack .tm-vc_icon_element {
        margin-bottom: 0px;
    }    
    .tm-header-style-infostack .tm-bgcolor-grey .header-content-main .header-content,
    .tm-header-style-infostack .tm-bgcolor-white .header-content-main .header-content{
    	color: rgba(0, 0, 0, 0.8);
    }       
    .tm-header-style-infostack .tm-bgcolor-skincolor .header-content-main .header-content,
    .tm-header-style-infostack .tm-bgcolor-darkgrey .header-content-main .header-content {
        color: rgba( 255,255,255,0.7);
    } 
    .tm-header-style-infostack .tm-bgcolor-skincolor .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner,
    .tm-header-style-infostack .tm-bgcolor-darkgrey .tm-vc_icon_element.tm-vc_icon_element-outer .tm-vc_icon_element-inner{	
    	color: #fff;
    }      
    header.tm-header-style-infostack .site-header:after{
        display: none;       
	}
    .tm-header-style-infostack .tm-header-icons{
    	padding-right: 20px;
    }
	.tm-header-style-infostack .tm-header-icons span:only-child:not(.tm-presentup-icon-search) {
		margin-right: -10px;
	}
	.tm-header-style-infostack .tm-header-icons .tm-header-search-link a,
	.tm-header-icons .themetechmount-fbar-btn a {
		color:#fff;
	}	
    .tm-header-style-infostack .themetechmount-fbar-btn.animated {
        -webkit-transform: translateX(0px);
        -ms-transform: translateX(0px);
        transform: translateX(0px);
    }
    .tm-header-style-infostack .themetechmount-fbar-btn a{    	
       background-color: transparent;
    }    
    .tm-header-style-infostack .tm-header-icon.tm-header-btn-w{
        padding-right: 0px;
        display: block;
        text-align: center;
        color: #fff;        
        width: auto;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation .tm-header-icon.tm-header-btn-w a{
        color: #fff; 
        font-size: 14px;
        padding: 0px 35px;
        display: block;
        letter-spacing: 1px;      
        background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 1);
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }    
    .tm-header-style-infostack #site-header-menu.tm-bgcolor-skincolor #site-navigation .tm-header-icon.tm-header-btn-w a{
    	background-color: rgba(0, 0, 0, 0.19);
    }
    .tm-header-style-infostack #site-header-menu.tm-bgcolor-skincolor #site-navigation .tm-header-icon.tm-header-btn-w a:hover{
    	background-color: rgba(0, 0, 0, 0.40);
    }    
    .tm-header-style-infostack #site-header-menu #site-navigation .tm-header-icon.tm-header-btn-w a:hover{
        background-color: rgba( <?php echo themetechmount_hex2rgb($skincolor); ?> , 0.80);
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .tm-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .tm-header-style-infostack .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .tm-header-style-infostack .kw-phone .tm-header-icon, 
    .tm-header-style-infostack .kw-phone .tm-header-icons,	
     header.tm-header-style-infostack #site-header-menu #site-navigation,
    .tm-header-style-infostack .kw-phone .themetechmount-fbar-btn{
        height: <?php echo esc_attr($themetechmount_header_menuarea_height); ?>px;
        line-height: <?php echo esc_attr($themetechmount_header_menuarea_height); ?>px !important;
    }
    .tm-header-style-infostack #site-header-menu #site-navigation div.mega-menu-wrap{
        position: relative;
    }
    .tm-header-style-infostack .tm-stickable-header-w{
        height: auto !important;
        position: relative;
    }
	.themetechmount-fullwide .tm-header-style-infostack .tm-stickable-header-w{
        position: initial;
    }	
    .tm-header-style-infostack #site-header-menu {
        float: none;
        position: absolute;
        width: 100%;
        bottom: -<?php echo esc_attr( ($themetechmount_header_menuarea_height/2) ); ?>px !important;
        z-index: 10;
    }    
    .tm-header-style-infostack .tm-top-info-con > ul:not(.social-icons),
    .tm-header-style-infostack .headerlogo{
        height: <?php echo esc_attr($header_height) - ($themetechmount_header_menuarea_height/2); ?>px;
        margin-bottom: <?php echo esc_attr( ($themetechmount_header_menuarea_height/2) ); ?>px;
    }
	.tm-header-style-infostack .kw-phone{
		height: <?php echo esc_attr($themetechmount_header_menuarea_height); ?>px;
		line-height: <?php echo esc_attr($themetechmount_header_menuarea_height); ?>px;
	}
	.tm-header-style-infostack .headerlogo .site-title {
		text-align: left;
	}
    .tm-header-style-infostack .site-branding{
        float: none;
    }
    .tm-header-style-infostack .site-header-menu-middle{
        margin: 0 15px;
        position: relative;        
        padding: 0px;
		-webkit-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.15);
		-moz-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.15);
		box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.15);
    }
    .tm-header-style-infostack .is_stuck .site-header-menu-middle{
        padding: 0px;
		box-shadow: none;
    }
	.tm-header-style-infostack .is_stuck.tm-sticky-bgcolor-custom .tm-container-for-header .tm-sticky-bgcolor-custom{
        background-color: transparent !important;
    }
    .tm-header-style-infostack.tm-header-overlay .site-header{
        position: absolute;
        width: 100%;        
    }    
    .tm-header-style-infostack.tm-header-overlay .site-branding,
    .tm-header-style-infostack.tm-header-overlay .tm-header-widgets-wrapper{
        position: relative;     
        z-index: 1;
    }
    .tm-header-style-infostack.tm-header-overlay .tm-titlebar-wrapper{
        z-index: 0;
    }
    .tm-header-style-infostack #site-header-menu .is_stuck .container,
    .tm-header-style-infostack .site-header-menu-inner{
        background-color: transparent;
    }
	.tm-header-style-infostack  .kw-phone .ttm-custombutton {
        margin-left:10px
    }
	.tm-header-style-infostack .kw-phone .ttm-custombutton {
		display: inline-block;
		background-color:<?php echo esc_attr($skincolor); ?>;
	}
	.tm-header-style-infostack .kw-phone .ttm-custombutton a {
		padding: 0 28px;
	}
	.tm-header-style-infostack .tm-header-menu-bg-color-skincolor .kw-phone .ttm-custombutton {
		background-color:#012546;
	}
    .tm-header-style-infostack .kw-phone .ttm-custombutton a {
		color:#fff;
		font-weight: 600;
	}
	#site-header-menu .is_stuck  #site-navigation div.mega-menu-wrap > ul > li:after,
	#site-header-menu .is_stuck  #site-navigation div.nav-menu > ul > li:after {
		background-color: rgba( <?php echo themetechmount_hex2rgb($stickymainmenufontcolor); ?> , 0.15);
	}
	#site-header-menu #site-navigation div.mega-menu-wrap > ul > li:last-child:after,
    #site-header-menu #site-navigation div.nav-menu > ul > li:last-child:after{
        display: none;
    }
	.tm-header-style-infostack .tm-top-info-con > ul:not(.social-icons) > li:after {
		content: "";
		height: 55px;
		width: 1px;
		background-color: rgba(0,0,0,0.09);
		display: block;
		position: absolute;
		right: 0px;
		top: 36px;
	}
	.tm-header-style-infostack .tm-top-info-con > ul:not(.social-icons) > li:last-child:after {
		content:none;
	}
	.tm-header-style-infostack .tm-titlebar-wrapper.tm-breadcrumb-on-bottom .tm-titlebar-main > .container .tm-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -14px;	
	}
	
	/*** Themetechmount Classic Box ***/
	.tm-header-style-classic-box .site-header:not(.is_stuck) .site-branding{
        padding-left: 30px;
    }  
    .tm-header-style-classic-box .site-header:not(.is_stuck) #site-header-menu{
        padding-right: 30px;
    }
    .tm-header-style-classic-box.tm-header-invert #site-header-menu{
        padding-left: 20px;
        padding-right: 0px;
    }
    .tm-header-style-classic-box.tm-header-overlay .site-header:not(.is_stuck){
    	background-color: transparent !important;
    }    
    .tm-header-style-classic-box.tm-header-overlay .site-header:not(.is_stuck) .container-fullwide{
        margin: 30px;
    }    
    .themetechmount-fullwide .tm-header-style-classic-box.tm-header-overlay .site-header .site-branding{
    	padding-left: 20px;
    }
    .themetechmount-fullwide .tm-header-style-classic-box.tm-header-overlay .site-header .site-header-menu{
    	padding-right: 20px;
    } 
	.tm-header-style-classic-box.tm-header-overlay .themetechmount-topbar-wrapper {
		padding: 0px 0px 47px;
	}
	.tm-header-style-classic-box.tm-header-overlay .tm-stickable-header-w {
	  top: <?php echo esc_attr( $header_height/2 ); ?>px;
	}
	.tm-header-style-classic-box.tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper .tm-titlebar-main{
		padding-top:<?php echo esc_attr( ($header_height/2) + 9 ); ?>px;
	}
    .tm-header-style-classic-box.tm-header-overlay .themetechmount-topbar-wrapper .themetechmount-fbar-btn{
        top: 53px;
    }	


	
    /* Right to Left Dropdown menu */          
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li > a:before {
        content: '\E83A';    
        left: auto;
        right: -14px;   
        -webkit-transition: right .2s ease-in-out;
        -moz-transition: right .2s ease-in-out;
        transition: right .2s ease-in-out;
	}    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item > a{
    	text-align: right;
    }    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu li.mega-menu-item:after {
        right: auto;
        left: 12px;
        position: absolute;
        border-right: none;
        border-left: 1px solid rgba(255,255,255,0.08);
    }  
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item > h4.mega-block-title {
        text-align: right;
    }    
   .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item:first-child:after {
    	border-left: none;
	}    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu:before {
        content: " ";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;		
        display:block;
    }
	.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu{
        background-image: none !important;      
    }    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item:hover > a,    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li.mega-menu-item:hover > a {
    	padding-left: 0px;
        padding-right: 20px;
	}
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li:hover > a:before {
        left: auto;
        right: 0px;
	}    
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
        padding-left: 15px;
        text-align: right;
    }    
    /* Header sticky animation */        
    .site-header.is_stuck {
        position: fixed;
        width:100%;
        top:0;    
        z-index: 999;
        margin:0;
        animation-name: menu_sticky;
        -webkit-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        -moz-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        padding: 0;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.page_item_has_children > a:after, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.menu-item-has-children > a:after{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        speak: none;
        display: inline-block;
        text-decoration: inherit;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 15px;
        content: "\f105";
        position: absolute;
        background-color: transparent;
        right: 12px;
        top: 16px;
        margin: 0;
    }    
    .tm-header-icons .themetechmount-fbar-btn,
    .tm-header-icons .tm-header-icon{
        margin-left: 11px;
    }
    .tm-header-icons .tm-header-icon:last-child{
        margin-left: 10px;
    }

     /*** Tm-Header-Invert ***/ 
    .tm-header-style-classic.tm-header-invert .container-fullwide #site-header-menu{
        margin-left:20px;
    }
    .tm-header-invert .site-header-main.container-fullwide{
        padding-right: 30px;
        padding-left: 0px;
    }     
    .tm-header-invert #site-header-menu{
        float: left;
    }
    .tm-header-invert .site-branding{
        float:right;    
    } 
    .tm-header-invert .tm-header-icons {        
        float: left;
        border-left: none;
        padding-right: 0px;
        padding-left: 0px;
        margin-left: 0px;
        margin-right: 0px;
    }
    .tm-header-invert .site-header .themetechmount-social-links-wrapper{
        padding-right: 0;
        padding-left: 0px;
    } 
    .tm-header-invert .tm-header-search-link,
    .tm-header-invert .tm-header-wc-cart-link{
        float: left;
        padding-left: 0;        
    }
    .tm-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {        
        text-align: right;
    }    
    .tm-header-invert #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .tm-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item {
        float: right;      
    }    
    .tm-header-invert .tm-header-top-wrapper.container-fullwide{
        padding-right: 15px;
    }
    .tm-header-invert .tm-header-icon, 
    .tm-header-invert .themetechmount-fbar-btn {
        margin-right: 20px;
        margin-left: 0px;
    }
    .tm-header-style-infostack.tm-header-invert .tm-header-widgets-wrapper {
        float: left;
    }    
    .tm-header-style-infostack.tm-header-invert .tm-header-widgets-wrapper .header-widget {
        padding-right: 24px;
        padding-left: 0;
    }    
    .tm-header-style-infostack.tm-header-invert .themetechmount-fbar-btn{        
        border-left: 1px solid rgba( <?php echo themetechmount_hex2rgb($mainMenuFontColor); ?> , 0.09) ;
        left: 0;
        float: left;
    }   
    .tm-header-style-infostack.tm-header-invert .tm-header-icon, 
    .tm-header-style-infostack.tm-header-invert .themetechmount-fbar-btn {
        margin-right: 0px;
        margin-left: 0px;
    }
    .tm-header-style-infostack:not(.tm-header-invert) .tm-header-top-wrapper.container-fullwide{
        padding-left: 15px;
        padding-right: 15px;
    }       

    /* tm-header-highlight-logo */
    .tm-header-style-classic .tm-header-highlight-logo .headerlogo:after,
    .tm-header-style-classic .tm-header-highlight-logo .headerlogo:before {
        content: "";
        position: absolute;
        left: 100%;
        top: 0;
        width: 64px;
        height: 100%;
        background-color: <?php echo esc_attr($skincolor); ?> ;
    }
    .tm-header-style-classic .tm-header-highlight-logo .headerlogo:before {
        left: auto;
        right: 100%;
        width: 1200px;
    }
    .tm-header-style-classic .tm-header-highlight-logo .headerlogo{
        position: relative;
        background-color: <?php echo esc_attr($skincolor); ?> ;
    }
    .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item-has-children > a.mega-menu-link:after{
        font-size: 10px;
		margin-left: 2px;
		margin-top: 3px;
		opacity: 0.5;
    }
       
	.tm-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .tm-header-style-infostack .site-header.is_stuck .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap    ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .tm-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .tm-header-style-infostack .site-header.is_stuck .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .tm-header-style-infostack .site-header.is_stuck .kw-phone .tm-header-icon, 
    .tm-header-style-infostack .site-header.is_stuck .kw-phone .tm-header-icons,	
     header.tm-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation,
    .tm-header-style-infostack .site-header.is_stuck .kw-phone .themetechmount-fbar-btn,
	.tm-header-style-infostack .site-header.is_stuck .headerlogo {
		 height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
	}
	
	.tm-header-style-classic-box.tm-header-style-elegant-box .tm-header-icon.tm-header-wc-cart-link {
		float: left;
	}
	.tm-header-style-elegant-box .tm-header-icons .tm-header-icon.tm-header-search-link:last-child {
		margin-left: 30px;
	}
	.tm-header-style-elegant-box .tm-header-icons .tm-header-search-link:before {
		content: '';
		background-color: #0c3356;
		width: 568px;
		height: 10px;
		margin-top: 0px;
		display: block;
		position: absolute;
		bottom: -10px;
		right: 0;
		transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-webkit-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
	}
	.tm-header-style-elegant-box .tm-header-icon.tm-header-search-link a {
		background-color: transparent;
		font-size: 16px !important;
	}
	.tm-header-style-elegant-box .tm-header-icon.tm-header-search-link {
		display: block;
		background-color: #0c3356;
		width: 70px;
		text-align: center;
	}
	.tm-header-style-elegant-box.tm-header-style-classic-box.tm-header-overlay .themetechmount-topbar-wrapper {
		position: absolute;
		width: 100%;
		z-index: 11;
	}
	.tm-header-style-elegant-box.tm-header-style-classic-box .site-header:not(.is_stuck) #site-header-menu {
		padding-right:0px;
	}
	.tm-header-text-area {
		float: right;
	}
	.tm-header-style-classic-highlight .tm-header-text-area {
		margin-left: 20px;
	}
	.tm-header-style-classic-highlight .tm-header-text-area .tm-vc_btn3-container {
		margin-bottom: 0px;
	}
}
