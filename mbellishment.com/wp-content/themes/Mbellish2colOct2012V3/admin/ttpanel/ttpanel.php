<?php
  require 'theme-options.php';

  //////////////////////////////////////////////////////////////////////////////
  // INIT FUNCTION
  //////////////////////////////////////////////////////////////////////////////    
  function ttpanel_add_init()
  {    
    if($_GET['page'] == 'functions.php')
    {
	    $file_dir = get_template_directory_uri();
		
    
        wp_enqueue_style("ttpanel_css", $file_dir."/admin/ttpanel/ttpanel.css", false, "1.0", "all");
        wp_enqueue_script("ttpanel_js", $file_dir."/admin/ttpanel/js/controls.js", false, "1.0");
        wp_enqueue_style("ttcolor_css", $file_dir."/admin/ttpanel/css/colorpicker.css", false, "1.0", "all");
        wp_enqueue_script("ttcolor_js", $file_dir."/admin/ttpanel/js/colorpicker.js", false, "1.0");
		wp_enqueue_script("ttcustom_js", $file_dir."/admin/ttpanel/js/options-custom.js", false, "1.0");
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', $file_dir.'/admin/ttpanel/js/my-script.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
		wp_enqueue_style('thickbox');
		wp_enqueue_script("ttpanel_easing", $file_dir."/admin/ttpanel/js/easing.js", false, "1.0");
		wp_enqueue_script("ttpanel_itoggle_js", $file_dir."/admin/ttpanel/js/engage.itoggle.js", false, "1.0");
        //wp_enqueue_script("ttpanel_checkbox_js", $file_dir."/admin/ttpanel/js/jquery.checkbox.js", false, "1.0");
    }

  }



  //////////////////////////////////////////////////////////////////////////////
  // ttpanel ADD FUNCTION
  ////////////////////////////////////////////////////////////////////////////// 
  function ttpanel_add_admin()
  {
  
    global $themename, $shortname, $options, $theme_heading_options, $theme_sidebars_style_options, $theme_menu_source_options,$imagepath;
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
    //if ( $_GET['page'] == basename(__FILE__) )
    {


         if( 'ttpanel_reset' == $_GET['action']  && $_GET['page'] == 'functions.php' && is_admin() && $_POST['anti_degen_protector'] == 'true') {

             foreach ($options as $value) {
                 delete_option( $value['id'] ); }

     //  header("Location: admin.php?page=ttpanel.php&reset=true");
       }
       else if ( 'ttpanel_save' == $_GET['action']  && $_GET['page'] == 'functions.php'  && is_admin() && $_POST['anti_degen_protector'] == 'true'  ) {
     //{
          /* foreach ($options as $value) {
      //    echo $_REQUEST['st_checkbox1111']."sa";
           update_option( $value['id'], addslashes($_REQUEST[ $value['id'] ]) );

            }  */

       foreach ($options as $value) {

           if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'],  ($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

    //       header("Location: admin.php?page=ttpanel.php&saved=true");
     //  die;

      }

     /*  else if( 'reset' == $_REQUEST['action'] ) {

           foreach ($options as $value) {
               delete_option( $value['id'] ); }

           header("Location: admin.php?page=zodiacbox.php&reset=true");
       die;

       }          */
   }



  }
  //////////////////////////////////////////////////////////////////////////////
  // ttpanel CORE FUNCTION
  ////////////////////////////////////////////////////////////////////////////// 
  function ttpanel_admin()
  {
  $docfile = get_template_directory().'/documentation/documentation.php';
  global $theme_default_options;
   global $themename, $shortname, $options;
   $navigation_content ="";
   $tab_content = "";
   $navigation_counter = 0;
   $tab_counter= 0;
   $options_content = "";
   foreach ($options as $value) {
     //var_dump(get_option( $value['id'] )); 
      if (get_option( $value['id'] ) != "") $value['std'] =   get_option( $value['id'] );
      else
      {
        update_option( $value['id'],$value['std'] ); 
      }

      //$value['std'] = htmlspecialchars( $value['std']);
      switch ( $value['type'] ) {        
        case "navigation":
          $tab_counter = 0;
          $style = ""; $selected = 'name="selected"';
   
          if($navigation_counter != 0) {$style = 'style="display:none;"'; $selected="";};
          $navigation_content .= '<li '.$selected.'>';
          $navigation_content .= '  <div class="passive" name="nav_'.$navigation_counter.'"></div>';
          $navigation_content .= '  <div class="active" '.$style.'></div>';
          $navigation_content .= '  <a href="javascript:" class="'.$value['icon'].'" >'.$value['name'].'</a>';
          $navigation_content .= '  <div class="active_arrow"></div>';
          $navigation_content .= '</li>';
          $tab_content .= '<ul class="tabs_wrapper" '.$style.' id="nav_'.$navigation_counter.'_tab">';   
          $options_content .= '<div class="box" id="nav_'.$navigation_counter.'_box" '.$style.' '.$selected.'>';    
        break;
        
        case "tab":
          $style = 'class="tab_active"'; $selected = 'name="selected"';
          $display = "";
          if($tab_counter != 0) {$style = 'class="tab_passive"'; $selected=""; $display='style="display:none;"';};
          $tab_content .= '<li '.$selected.'>';
          $tab_content .= '  <a href="javascript:" '.$style.' name="tab_'.$navigation_counter.'_'.$tab_counter.'">'.$value["name"].'</a>';
          $tab_content .= '</li>';
          $options_content .= '<div class="content_wrapper" id="tab_'.$navigation_counter.'_'.$tab_counter.'_wrapper" '.$display.' '. $selected . '>';

        break;
        
        case "tab-close":
          $options_content .= '  <input name="save" type="submit" class="btn_save" value="" />  ';
          $options_content .= '<br /></div>';
          $options_content .= '</div>';
          $tab_counter++;
        break;  
        
        case "tab-close-nosave":
          $options_content .= '<br /></div>';
          $options_content .= '</div>';
          $tab_counter++;
        break;  
  
        case "navigation-close":
          $tab_content .= '</ul>';
          $navigation_counter++;  
          $options_content .= '</div>';  
        break; 
		
        case "info":
          $options_content .= '<div class="intro_info">';
          $options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/info_big.png" alt="info" class="info_big" />';
          $options_content .= '<p>'.$value['name'].'</p>';
          $options_content .= '</div>';
          $options_content .= '<div class="content">';
          
        break;
		
        case "help2":
		  $info_stored = $value['std'];
          $options_content .= '<div><h2>'.$value['name'].'</h2>';
		  if ($info_stored) {
		  $options_content .= '<p> <embed src="'.$info_stored[url].'?version=3&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="'.$info_stored[width].'" height="'.$info_stored[height].'" allowscriptaccess="always" allowfullscreen="true"></embed></p>';
		  }
          $options_content .= '<p>'.$value['desc'].'</p>';
		  $options_content .= '</div>';

          
        break;

        case "help3":
	
          $options_content .= '<div><h2>'.$value['name'].'</h2>';
          $options_content .= $value['desc'];
	  $options_content .= '</div>';

          
        break;
        
		
        case "select":
          $select_content = "";
          foreach ($value['options'] as $select_options) {
            $select_content .=   '<li>'.$select_options.'</li>';
          }
          $options_content .= '
                            <div class="select">
                                <h2>'.$value['name'].'</h2>
                                
                                <p class="desc" style="display:none;">'.$value['desc'].'</p>
                                <div class="selectbox_wrapper">
                                    <input type="hidden" value="'.(stripslashes(($value['std']))).'" name="'.$value['id'].'" id="'.$value['id'].'">
                                    <div class="selected">'.(stripslashes(($value['std']))).'</div>
                                    <div class="select_options_wrapper">
                                      <div class="select_options_container">
                                            <ul class="select_options">
                                            '.$select_content.'
                                            </ul>
                                        </div>
                                        <div class="scrollbox">
                                            <div class="scrollbar_wrapper">
                                              <div class="scrollbar" name="0">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="select_shadow"></div>
                                    </div>
                                </div>
								<div style="float:left;font-style:italic;">'.$value['desc'].'</div>
                            </div><!-- END "div.select" -->';
			//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';

        break;
        
		
        case "select_page":
          $select_content = "";
          $pages = get_pages(); 
          foreach ($pages as $select_options) {
            $select_content .=   '<li>'.$select_options->post_name.'</li>';
          }
          $options_content .= '
                            <div class="select">
                                <h2>'.$value['name'].'</h2>
                                
                                <p class="desc" style="display:none;">'.$value['desc'].'</p>
                                <div class="selectbox_wrapper">
                                    <input type="hidden" value="'.(stripslashes(($value['std']))).'" name="'.$value['id'].'" id="'.$value['id'].'">
                                    <div class="selected">'.(stripslashes(($value['std']))).'</div>
                                    <div class="select_options_wrapper">
                                      <div class="select_options_container">
                                            <ul class="select_options">
                                            '.$select_content.'
                                            </ul>
                                        </div>
                                        <div class="scrollbox">
                                            <div class="scrollbar_wrapper">
                                              <div class="scrollbar" name="0">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="select_shadow"></div>
                                    </div>
                                </div>
								<div style="float:left;font-style:italic;">'.$value['desc'].'</div>
                            </div><!-- END "div.select" -->';
			//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';

        break;        
		
		case "sectiontop":
			$options_content .= '<div class="section-top">';
			$options_content .= '<h2>'.$value['name'].'</h2></div>';
		
		break;
        
		case "sectionbot":

			$options_content .= '<div class="section-bot"></div>';
		
		break;
        

		case 'typography':								
			$typography_stored = $value['std'];		
			/* Font Size */ 
			//var_dump($typography_stored);
			$options_content .= '<h2>'.$value['name'].'</h2>';
			$options_content .= '<div class="typography-select">';
			$options_content .= '<select class="of-typography of-typography-size" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';
						
			for ($i = 9; $i < 71; $i++)
			{ 
				$test = $i.'px';
				$options_content .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
			}
					
			$options_content .= '</select>';
					
			/* Font Face */
			$options_content .= '<select class="of-typography of-typography-face" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';
							
			$faces = array('arial'=>'Arial',
				'verdana'=>'Verdana, Geneva',
				'trebuchet'=>'Trebuchet',
				'georgia' =>'Georgia',
				'times'=>'Times New Roman',
				'tahoma'=>'Tahoma, Geneva',
				'palatino'=>'Palatino',
				'helvetica'=>'Helvetica*' );			
							
			foreach ($faces as $i=>$face)
				{
					$options_content .= '<option value="'. $i .'" ' . selected($typography_stored['face'], $i, false) . '>'. $face .'</option>';
				}			
											
				$options_content .= '</select>';	
							
			/* Font Weight */	
				$options_content .= '<select class="of-typography of-typography-style" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
				$styles = array('normal'=>'Normal',
								'italic'=>'Italic',
								'bold'=>'Bold' );
											
					foreach ($styles as $i=>$style)
						{
							
						$options_content .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		
							
						}
							
						$options_content .= '</select>';
						$options_content .= '</div>';	
			/* Font Color */			
				$options_content .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography"><div style="background-color: '.$typography_stored['color'].'"></div></div>';
				$options_content .= '<input size="6" style="float:left;" class="of-color of-typography of-typography-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';
				$options_content .= '<div style="float:left;font-style:italic;margin-top:4px;">'.$value['desc'].'</div>';
				//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';
				
		break; 		
        case "checkbox":
          $options_content .= '<div class="switch">';
          $options_content .= '<h2>'.$value['name'].'</h2>';
		  $options_content .= '<div class="btn_box">';
          $options_content .= '<div class="btn_switch">';
          $options_content .= '<input type="hidden" class="btn_switch_input" name="'.$value['id'].'" id="'.$value['id'].'" value="'.$value['std'].'">';
          if($value['std']== 1) $options_content .= '<div class="on_off" style="left:0px"></div>';
          else $options_content .= '<div class="on_off"></div>';
          $options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/btn_switch_overlay.png" class="over" />';

          $options_content .= '</div><!-- END "div.btn_switch" -->';
		  $options_content .= '</div><!-- END "div.btn_box" -->';


		  $options_content .= '';
          $options_content .= '<div style="float:left;font-style:italic;margin-top:10px;width:500px;"><p>'.$value['desc'].'</p></div>';

		$options_content .= '</div><!-- END "div.switch" -->';
		//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';	
        break;
		
		
		case 'numeric':
		$options_content .= '
		  <div class="input-numeric">
			<h2>'.$value['name'].'</h2>
		<input	style="padding:12px 5px;" size="'.$value['width'].'" name="'.$value['id'].'" id="'.$value['id'].'" type="text" value="'.absint($value['std']).'" class="small-text" /> '.$value['text'].'<div class="description">'.$value['desc'].'</div>
          </div><!-- END "div.input" -->';
		 
		break;
		
        case "checkbox2":
          $options_content .= '<div class="switch-wrap"><div class="switch">';
          $options_content .= '<div class="switch_header"><h2>'.$value['name'].'</h2></div>';
          $options_content .= '<div class="btn_switch_container"><div class="btn_switch">';
          $options_content .= '<input type="hidden" class="btn_switch_input" name="'.$value['id'].'" id="'.$value['id'].'" value="'.$value['std'].'">';
          if($value['std']== 1) $options_content .= '<div class="on_off" style="left:0px"></div>';
          else $options_content .= '<div class="on_off"></div>';
          $options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/btn_switch_overlay.png" class="over" />';

          $options_content .= '</div><!-- END "div.btn_switch" -->';
		  $options_content .= '</div><!-- END "div.btn_switch_container" -->';

		  
          $options_content .= '<div class="description" style="width: 490px;padding-right: 50px;margin: 5px 0 20px;">'.$value['desc'].'</div>';
		  $options_content .= '</div></div><!-- END "div.switch" -->';
		  //$options_content .= '<div style="clear:both;"></div>';
        break;

		case 'divider':
		
		$options_content .= '<div class="divider">
		  <img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />
		  </div>';

		break;
		
		case 'marginbox':
			$margin_stored = $value['std'];
			$box_size = '5';
			$options_content .= '<div class="border-options">';
			$options_content .= '<h2>'.$value['name'].'</h2>';
			$options_content .= '<div class="margin-wrapper">';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[t]" id="'.$value['id'].'[t]" value="'.$margin_stored['t'].'">px ';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[r]" id="'.$value['id'].'[r]" value="'.$margin_stored['r'].'">px ';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[b]" id="'.$value['id'].'[b]" value="'.$margin_stored['b'].'">px ';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[l]" id="'.$value['id'].'[l]" value="'.$margin_stored['l'].'">px ';
			$options_content .= '</div>';
			
			$options_content .= '<div class="margin-sub-wrapper"><div class="margin-sub">Top</div><div class="margin-sub">Right</div><div class="margin-sub">Bottom</div><div class="margin-sub">Left</div></div>';

			$options_content .= '<div class="description">'.$value['desc'].'</div>';
			
			$options_content .= '</div><!-- END "div.input" -->';
			
		  //<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';
		break;
		
		case 'diminsion':
			$margin_stored = $value['std'];
			$box_size = '6';
			$options_content .= '<div class="border-options">';
			$options_content .= '<h2>'.$value['name'].'</h2>';
			$options_content .= '<div class="margin-wrapper">';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[width]" id="'.$value['id'].'[width]" value="'.$margin_stored['width'].'">px ';
			$options_content .= '<input size="'.$box_size.'" type="text" name="'.$value['id'].'[height]" id="'.$value['id'].'[height]" value="'.$margin_stored['height'].'">px ';

			$options_content .= '</div>';
			
			$options_content .= '<div class="diminsion-sub-wrapper"><div class="margin-sub">Width</div><div class="margin-sub">Height</div></div>';
			if ($value['help'] != "") {
			$options_content .= '<div class="helpme"><a href="'. get_template_directory_uri() .'/documentation/'.$value['help'] .'?height=600&width=700 title="'.$value['caption'] .'" class="thickbox"><img src="'.get_template_directory_uri().'/admin/ttpanel/images/help.png" " /></a></div>';
			}
			$options_content .= '<div class="description">'.$value['desc'].'</div>';
			$options_content .= '</div><!-- END "div.input" -->';
			

		break;

		case 'help':
		$options_content .= '<div style="text-align:center;padding:20px;"> 
		<input alt="#TB_inline?height=300&amp;width=400&amp;inlineId=examplePopup1" title="add a caption to title attribute / or leave blank" class="thickbox" type="button" value="Show Thickbox Example Pop-up 1" />  
		</div>';
		$options_content .= '<div id="examplePopup1" style="display:none">
			<h2>Example Pop-up Window 1</h2>
			<div style="float:left;padding:10px;">
			<img src="http://shibashake.com/wordpress-theme/wp-content/uploads/2010/03/bio1.jpg"  width="150" height = "168"/>
			</div>
			I was born at DAZ Studio. They created me with utmost care and that is why I am the hottie that you see today. My interests include posing, trying out cute outfits, and more posing.

		<strong>Just click outside the pop-up to close it.</strong>
		</div>';	
			
		break;
		
		case 'border':
			$border_stored = $value['std'];
			$options_content .= '<div class="border-options"><h2>'.$value['name'].'</h2>';
			$options_content .= '<div class="border-select">';
			$options_content .= '<select class="of-border of-border-width" name="'.$value['id'].'[width]" id="'. $value['id'].'_width">';
							
			for ($i = 0; $i < 21; $i++)
				{ 
				$options_content .= '<option value="'. $i .'" ' . selected($border_stored['width'], $i, false) . '>'. $i .'</option>';		
				}
							
			$options_content .= '</select>';
							
			/* Border Style */
			$options_content .= '<select class="of-border of-border-style" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
							
			$styles = array('none'=>'None',
							'solid'=>'Solid',
							'dashed'=>'Dashed',
							'dotted'=>'Dotted');
											
			foreach ($styles as $i=>$style)
			{
			//var_dump($i);			
			$options_content .= '<option value="'. $i .'" ' . selected($border_stored['style'], $i, false) . '>'. $style .'</option>';		
			}
							
			$options_content .= '</select>';
			$options_content .= '';				
			/* Border Color */		
			$options_content .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography"><div style="background-color: '.$border_stored['color'].'"></div></div>';
			$options_content .= '<input class="of-color of-border of-border-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $border_stored['color'] .'" />';
			$options_content .= '<div style="font-style:italic;margin-top:4px;">'.$value['desc'].'</div></div><!-- .border-select --></div>';
				//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';			
		break; 
 
		// Color picker
		case "color":
			
			$options_content .= '<div class="input color">
			<h2 class="colorh2">'.$value['name'].'</h2><div id="' . esc_attr( $value['id'] . '_picker' ) . '" class="colorSelector typography"><div style="' . 'background-color:' . $value['std'] . '"></div></div>';
			$options_content .= 
			'<input class="of-color" style="color:#fff;" name="' . $value['id'] . '" id="' .  $value['id']  . '" type="text" value="' . $value['std']  . '" />
			</div><!-- END "div.input" -->
			<div style="float:left;font-style:italic;margin-top:4px;">'.$value['desc'].'</div>';
		  
			
		break;  
 
		
        case "text":
          $options_content .= '
		  <div class="text-box">
			<h2>'.$value['name'].'</h2>
			<input size="'.$value['width'].'" type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'.(stripslashes(($value['std']))).'"> '.$value['text'].'
			<div class="description">'.$value['desc'].'</div>
          </div><!-- END "div.input" -->';
		  //<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';
        break;
		
 						
		case 'upload':	
			$options_content .= '<div class="upload-wrap">';
			$options_content .= '<div class="input">';
			$options_content .= '<h2>'.$value['name'].'</h2>';
			$options_content .= '<label for="upload_image">';
			$options_content .= '<input class="upload" type="text" size="70" name="'.$value['id'].'" value="' . $value['std']  . '" />';	
			
			$options_content .= '<input class="upload-button" name="wsl-image-add" type="button" value="" />';
			$options_content .= '<div class="uploaded-image" ><img style="max-width:400px;margin:10px 0;" src="'. $value['std'] .'"  /></div>';
			$options_content .= '</label>';
			$options_content .= '</div>';
							
			$options_content .= '<div>'.$value['desc'].'</div>';
		    //$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />' ;
			$options_content .= '</div>';
		break;

		
		case 'upload2':	
			

			$options_content .= '<div class="upload-wrap">';
			$options_content .= '<div class="input">';
			$options_content .= '<h2>'.$value['name'].'</h2>';
			$options_content .= '<label for="upload_image">';
			$options_content .= '<input class="upload" type="text"  size="70" name="wsl-image-add" value="' . $value['std']  . '" />';
			$options_content .= '<div class="uploaded-image" ><img style="max-width:400px;margin:10px 0;" src="'. $value['std'] .'"  /></div>';
			$options_content .= '<input class="upload-button" name="wsl-image-add" type="button" value="" />';
								 
			//$options_content .= '<input id="upload_image" type="text" size="70" name="'.$value['id'].'" value="' . $value['std']  . '" />';
			//$options_content .= '<input id="upload_image_button" class="button-upload" type="button" value="" />';
			$options_content .= '</label>';
			$options_content .= '</div>';
							
			$options_content .= '<div>'.$value['desc'].'</div>';
		    $options_content .= '</div>';
		break;
	
		// Radio Box
		case "radio2":
		$checked = ' checked="checked"';
				$options_content .= '<div class="radio-slide">';
				$options_content .= '<h2>'.$value['name'].'</h2><br /><div>';
			foreach($value['options'] as $option=>$name) {
				$myradio = $value['std'] ; //echo $option . ' ' . $myradio;
				if ($myradio != $option ) { $checked = '';} else { $checked = ' checked="checked"';}
				//$options_content .= var_dump($value);
				$options_content .= 
				'<label class="radio-button"><input class="btn_radio" name="'.$value['id'].'" type="radio" value="'.$option.'" '.  $checked .' /><span class="radio-text">'.$name.'</span></label>';		
			} 
			$options_content .= '</div><div class="description">'.$value['desc'].'</div>';
			$options_content .= '</div><!-- END "div.radio-slide" -->';
			//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';
		break;                

 		// Radio Box
		case "radio":
		$checked = ' checked="checked"';
				$options_content .= '<div class="radio-slide">';
				$options_content .= '<h2>'.$value['name'].'</h2><br /><div class="my_itoggle">';
				
			foreach($value['options'] as $option=>$name) {
				$myradio = $value['std'] ; 
				if ($myradio != $option ) { $checked = '';} else { $checked = ' checked="checked"';}
				$options_content .= 
				'
				 <input class="btn_radio" type="radio" id="'.$value['id'].'_'.$option.'" name="'.$value['id'].'_'.$option.'"  value="'.$option.'" '. $checked .' /><div class="radio-name"> '.$name.'</div>';		
			} 
			
			$options_content .= '</div><div class="description">'.$value['desc'].'</div>';
			$options_content .= '</div><!-- END "div.radio-slide" -->';
		break;  
		
		// Radio Box
		case "radioorig":
		$checked = ' checked="checked"';
				$options_content .= '<div class="radio-slide">';
				$options_content .= '<h2>'.$value['name'].'</h2><br /><div>';
			foreach($value['options'] as $option=>$name) {
				$myradio = $value['std'] ; //echo $option . ' ' . $myradio;
				if ($myradio != $option ) { $checked = '';} else { $checked = ' checked="checked"';}
				//$options_content .= var_dump($value);
				$options_content .= 
				'<input class="btn_radio" name="'.$value['id'].'" type="radio" value="'.$option.'" '.  $checked .' />'.$name.'<br/>';		
			//var_dump($option);
			} 
			
			$options_content .= '</div><div class="description">'.$value['desc'].'</div>';
			$options_content .= '</div><!-- END "div.radio-slide" -->';
			//$options_content .= '<img src="'.get_template_directory_uri().'/admin/ttpanel/images/divider2.png" class="divider" alt="divider" />';
		break;                
              

        
        case "textarea":
          $options_content .= '<div class="input">';
          $options_content .= '<h2>'.$value['name'].'</h2>';
          $options_content .= '<textarea rows="7" id="'.$value['id'].'" name="'.$value['id'].'">'.(stripslashes(($value['std']))).'</textarea>';
		  
          $options_content .= '<div style="float:left;font-style:italic;">'.$value['desc'].'</div></div><!-- END "div.input" -->';
        break;
        
        case "textarea-ad":
		$str = $value['id'];$last = $str[strlen($str)-1];
          $options_content .= '<div class="input">';
          $options_content .= '<h2>'.$value['name'].'</h2>';
		  
          $options_content .= '<textarea rows="7" id="'.$value['id'].'" name="'.$value['id'].'">'.(stripslashes(($value['std']))).'</textarea>';
		  $options_content .= '<div style="margin:5px 0;">Examples: [ad code='.$last.'] - [ad code='.$last.' align=center] - [ad code='.$last.' align=right]</div>';
		  $options_content .= '<div style="max-width:520px;overflow:hidden;">'.(stripslashes(($value['std']))).'</div>';
          $options_content .= '<div style="float:left;font-style:italic;">'.$value['desc'].'</div></div><!-- END "div.input" -->';
        break;
        
        case "reset":
          $options_content .= '<input type="submit" value="ttpanel_reset" class="btn_reset" name="reset" id="reset">';        
        break; 

                

      }    
   }  
  ?>
<img id="sneak_peak" style='position:absolute; z-index:999;'>
<div class="fresh_tooltip" style="position:absolute";>'.$value['desc'].'</div>
<div id="ttpanel">  
  <form id="ttpanel_form" method="post" action="?page=functions.php&action=ttpanel_save">
    <input type="hidden" name="anti_degen_protector" value="true" />
	<div id="wrapper_glogal">
    	<div class="wrapper_bg_outer">
            <div class="wrapper_bg">
                <div class="left">
                    <div class="logo">
					<img class="logo-img" src="<?php echo get_template_directory_uri() ?>/admin/ttpanel/images/themeoptions.png"  />
					</div>
                    <ul class="wrapper_nav">
                            <?php echo $navigation_content;?>
                    </ul><!-- END "ul.wrapper_nav" -->
                    <div class="shadow_bottom"></div>
                </div><!-- END "div.left" -->
                <div class="right">
                    <div class="header">
                        <div class="header_inner">

                            <div class="links">
							
								<?php if (file_exists($docfile)) { ?>
                                <p><a href="<?php echo get_template_directory_uri();?>/documentation/documentation.php" target="_blank" class="btn_small">Documentation</a></p>
								<?php } ?>
							<img class="screenshot" src="<?php echo get_template_directory_uri() ?>/screenshot.png" width="115px" height="80px"  />	
		<div class="theme-version">

		</div>

                            </div><!-- END "div.links" -->


						</div><!-- END "div.header_inner" -->
                       <?php echo $tab_content; ?>
                    </div><!-- END "div.header" -->
                    <?php echo $options_content; ?>
    
                </div><!-- END "div.right" -->
                <div class="clear"></div>
            </div><!-- END "div.wrapper_bg" -->
        </div><!-- END "div.wrapper_bg_outer" -->
	</div>
    <!-- END "div#wrapper_glogal" -->
    <div class="theme_version">
	  	<p style="color:#999;text-align:right;">
	<?php _e("Theme Options Version: ", THEME_NS); ?> <?php echo THEME_OPTIONS; ?><br />
	<?php _e("Framework Versions: ", THEME_NS); ?> <?php echo FRAMEWORK_VERSION1 . '/' . FRAMEWORK_VERSION2; ?><br />
	</p>
    </div>
    </form>
</div><!-- END "div#ttpanel" -->



  <?php
 

 

	

  
 
  }
  //////////////////////////////////////////////////////////////////////////////
  // ACTIONS
  ////////////////////////////////////////////////////////////////////////////// 
  add_action('admin_init', 'ttpanel_add_init');  
  add_action('admin_menu', 'ttpanel_add_admin');  

function GetBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}

?>
