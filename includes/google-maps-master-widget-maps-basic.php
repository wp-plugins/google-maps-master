<?php
//Hook Widget
add_action( 'widgets_init', 'google_maps_master_widget_maps_basic' );
//Register Widget
function google_maps_master_widget_maps_basic() {
register_widget( 'google_maps_master_widget_maps_basic' );
}

class google_maps_master_widget_maps_basic extends WP_Widget {
	function google_maps_master_widget_maps_basic() {
	$widget_ops = array( 'classname' => 'Google Maps Master Basic', 'description' => __('Google Maps Master Basic Widget uses Minimal code for a Small System Trace with extremely fast Maps page load times. ', 'google_maps_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'google_maps_master_widget_maps_basic' );
	$this->WP_Widget( 'google_maps_master_widget_maps_basic', __('Google Maps Master Basic', 'google_maps_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Save WPOptions
		add_option('google_maps_master_view_basic_choice', "ROADMAP");
		$google_maps_master_load_basic_roadmap = "ROADMAP";
		update_option ('google_maps_master_load_basic_roadmap', $google_maps_master_load_basic_roadmap); 
		$google_maps_master_load_basic_satellite = "SATELLITE";
		update_option ('google_maps_master_load_basic_satellite', $google_maps_master_load_basic_satellite);
		$google_maps_master_load_basic_hybrid = "HYBRID";
		update_option ('google_maps_master_load_basic_hybrid', $google_maps_master_load_basic_hybrid);
		$google_maps_master_load_basic_terrain = "TERRAIN";
		update_option ('google_maps_master_load_basic_terrain', $google_maps_master_load_basic_terrain);
		$google_maps_master_load_basic_marker1 = "google_maps_master_load_basic_marker1";
		update_option ('google_maps_master_load_basic_marker1', $google_maps_master_load_basic_marker1);
		//Set Tittle
		$google_maps_title = isset( $instance['google_maps_title'] ) ? $instance['google_maps_title'] :false;
		$google_maps_title_new = isset( $instance['google_maps_title_new'] ) ? $instance['google_maps_title_new'] :false;
		//Set Wide Map Options
		$googlemapsspacer ="'";
		$show_google_maps_master = isset( $instance['show_google_maps_master'] ) ? $instance['show_google_maps_master'] :false;
		$google_maps_zoom = isset( $instance['google_maps_zoom'] ) ? $instance['google_maps_zoom'] :false;
		$google_maps_width = isset( $instance['google_maps_width'] ) ? $instance['google_maps_width'] :false;
		$google_maps_height = isset( $instance['google_maps_height'] ) ? $instance['google_maps_height'] :false;
		$google_maps_latitude = isset( $instance['google_maps_latitude'] ) ? $instance['google_maps_latitude'] :false;
		$google_maps_longitude = isset( $instance['google_maps_longitude'] ) ? $instance['google_maps_longitude'] :false;
		//Set Marker Specific Options
		$show_google_maps_marker1 = isset( $instance['show_google_maps_marker1'] ) ? $instance['show_google_maps_marker1'] :false;
		$google_maps_marker1_basic_icon = false;
		$google_maps_marker1_name = isset( $instance['google_maps_marker1_name'] ) ? $instance['google_maps_marker1_name'] :false;
		$google_maps_marker1_avatar = isset( $instance['google_maps_marker1_avatar'] ) ? $instance['google_maps_marker1_avatar'] :false;
		$google_maps_marker1_address = isset( $instance['google_maps_marker1_address'] ) ? $instance['google_maps_marker1_address'] :false;
		$google_maps_marker1_city = isset( $instance['google_maps_marker1_city'] ) ? $instance['google_maps_marker1_city'] :false;
		$google_maps_marker1_state = isset( $instance['google_maps_marker1_state'] ) ? $instance['google_maps_marker1_state'] :false;
		$google_maps_marker1_country = isset( $instance['google_maps_marker1_country'] ) ? $instance['google_maps_marker1_country'] :false;
		$google_maps_marker1_phone = isset( $instance['google_maps_marker1_phone'] ) ? $instance['google_maps_marker1_phone'] :false;
		$google_maps_marker1_mobile = isset( $instance['google_maps_marker1_mobile'] ) ? $instance['google_maps_marker1_mobile'] :false;
		$google_maps_marker1_email = isset( $instance['google_maps_marker1_email'] ) ? $instance['google_maps_marker1_email'] :false;
		$google_maps_marker1_website = isset( $instance['google_maps_marker1_website'] ) ? $instance['google_maps_marker1_website'] :false;
		$google_maps_marker1_extra = isset( $instance['google_maps_marker1_extra'] ) ? $instance['google_maps_marker1_extra'] :false;
		$google_maps_marker1_extra_link = isset( $instance['google_maps_marker1_extra_link'] ) ? $instance['google_maps_marker1_extra_link'] :false;
		$google_maps_marker1_latitude = isset( $instance['google_maps_marker1_latitude'] ) ? $instance['google_maps_marker1_latitude'] :false;
		$google_maps_marker1_longitude = isset( $instance['google_maps_marker1_longitude'] ) ? $instance['google_maps_marker1_longitude'] :false;
		echo $before_widget;
		
		// Display the widget title
	if ( $google_maps_title ){
		if (empty ($google_maps_title_new)){
			if(is_multisite()){
			$google_maps_title_new = get_site_option('google_maps_master_name');
			}
			else{
			$google_maps_title_new = get_option('google_maps_master_name');
			}
		echo $before_title . $google_maps_title_new . $after_title;
		}
		else{
		echo $before_title . $google_maps_title_new . $after_title;
		}
	}
	else{
	}
	//Display Google Maps
	if ( $show_google_maps_master ){
		$google_maps_master_view_basic_choice = get_option('google_maps_master_view_basic_choice');
		if (empty($google_maps_master_view_basic_choice)){
		$google_maps_master_view_basic_choice = 'ROADMAP';
		}
		if (empty($google_maps_zoom)){
		$google_maps_zoom = '18';
		}
		if (empty($google_maps_width)){
		$google_maps_width = 'auto';
		}
		if (empty($google_maps_height)){
		$google_maps_height = '400';
		}
		if (empty($google_maps_latitude)){
		$google_maps_latitude = '32.720392';
		}
		if (empty($google_maps_longitude)){
		$google_maps_longitude = '-117.228778';
		}
		if ( $show_google_maps_marker1 ){
			if ( get_option('google_maps_marker1_basic_choice')== "google_maps_master_load_basic_marker1" ){
				$google_maps_marker1_basic_icon = plugins_url('images/techgasp_icon_map_original.png', dirname(__FILE__));
			}
			if (empty($google_maps_marker1_latitude)){
			$google_maps_marker1_latitude = $google_maps_latitude;
			}
			if (empty($google_maps_marker1_longitude)){
			$google_maps_marker1_longitude = $google_maps_longitude;
			}
			if (empty($google_maps_marker1_avatar)){
			$google_maps_marker1_avatar = plugins_url('images/techgasp_empty_avatar.png', dirname(__FILE__));
			}
		}
		else{
			$google_maps_marker1_basic_icon = plugins_url('images/techgasp_empty_avatar.png', dirname(__FILE__));
			$google_maps_marker1_latitude = $google_maps_latitude;
			$google_maps_marker1_longitude = $google_maps_longitude;
			$google_maps_marker1_avatar = plugins_url('images/techgasp_empty_avatar.png', dirname(__FILE__));
			}
		echo '<style>#map_basic img{max-width:none; background:none;}</style>' .
		'<div id="map_basic" style="width:'.$google_maps_width.'px; height:'.$google_maps_height.'px;"></div>' .
		'<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>' .
		'<script type="text/javascript">' .
		'function initialize() {
		var mapOptions = {
		center: new google.maps.LatLng('.$google_maps_latitude.', '.$google_maps_longitude.'),
		zoom: '.$google_maps_zoom.',
		mapTypeId: google.maps.MapTypeId.'.$google_maps_master_view_basic_choice.',
		mapTypeControl: true,
		panControl: true,
		panControlOptions: {
		position: google.maps.ControlPosition.TOP_RIGHT
		},
		zoomControl: true,
		zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.LEFT_TOP
		},
		streetViewControl: true,
		streetViewControlOptions: {
		position: google.maps.ControlPosition.LEFT_TOP
		},
		};
		var map = new google.maps.Map(document.getElementById("map_basic"),
		mapOptions);
		var marker1 = new google.maps.Marker({
		position: new google.maps.LatLng('.$google_maps_marker1_latitude.', '.$google_maps_marker1_longitude.'),
		map: map,
		icon: '.$googlemapsspacer.''.$google_maps_marker1_basic_icon.''.$googlemapsspacer.'
		});
		var infowindow1 = new google.maps.InfoWindow({
		content: '.$googlemapsspacer.'<div style="text-align:center; vertical-align:middle;"><img src="'.$google_maps_marker1_avatar.'"></div><div style="text-align:center;"><h3>'.$google_maps_marker1_name.'</h3></div><div style="text-align:center;">'.$google_maps_marker1_address.'</div><div style="text-align:center;">'.$google_maps_marker1_city.'</div><div style="text-align:center;">'.$google_maps_marker1_state.'</div><div style="text-align:center;">'.$google_maps_marker1_country.'</div><div style="text-align:center;">'.$google_maps_marker1_phone.'</div><div style="text-align:center;">'.$google_maps_marker1_mobile.'</div><div style="text-align:center;"><a href="mailto:'.$google_maps_marker1_email.'">'.$google_maps_marker1_email.'</a></div><div style="text-align:center;"><a href="'.$google_maps_marker1_website.'" target="_blank">'.$google_maps_marker1_website.'</a></div><div style="text-align:center;"><a href="'.$google_maps_marker1_extra_link.'" target="_blank">'.$google_maps_marker1_extra.'</a></div>'.$googlemapsspacer.',
		});
		google.maps.event.addListener(marker1, '.$googlemapsspacer.'click'.$googlemapsspacer.', function() {
		infowindow1.open(map, marker1);
		});
		}
		google.maps.event.addDomListener(window, '.$googlemapsspacer.'load'.$googlemapsspacer.', initialize);' .
		'</script>';
	}
	else{
	}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['google_maps_title'] = strip_tags( $new_instance['google_maps_title'] );
		$instance['google_maps_title_new'] = $new_instance['google_maps_title_new'];
		//Store Wide Map Options
		$instance['show_google_maps_master'] = $new_instance['show_google_maps_master'];
		$instance['google_maps_master_view_basic_choice'] = $new_instance['google_maps_master_view_basic_choice'];
		update_option('google_maps_master_view_basic_choice', $new_instance['google_maps_master_view_basic_choice']);
		$instance['google_maps_zoom'] = $new_instance['google_maps_zoom'];
		$instance['google_maps_width'] = $new_instance['google_maps_width'];
		$instance['google_maps_height'] = $new_instance['google_maps_height'];
		$instance['google_maps_latitude'] = $new_instance['google_maps_latitude'];
		$instance['google_maps_longitude'] = $new_instance['google_maps_longitude'];
		//Store Marker Icon Options
		$instance['show_google_maps_marker1'] = $new_instance['show_google_maps_marker1'];
		$instance['google_maps_marker1_basic_choice'] = $new_instance['google_maps_marker1_basic_choice'];
		update_option('google_maps_marker1_basic_choice', $new_instance['google_maps_marker1_basic_choice']);
		$instance['google_maps_marker1_name'] = htmlspecialchars($new_instance['google_maps_marker1_name'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_avatar'] = htmlspecialchars($new_instance['google_maps_marker1_avatar'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_address'] = htmlspecialchars($new_instance['google_maps_marker1_address'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_city'] = htmlspecialchars($new_instance['google_maps_marker1_city'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_state'] = htmlspecialchars($new_instance['google_maps_marker1_state'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_country'] = htmlspecialchars($new_instance['google_maps_marker1_country'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_phone'] = htmlspecialchars($new_instance['google_maps_marker1_phone'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_mobile'] = htmlspecialchars($new_instance['google_maps_marker1_mobile'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_email'] = htmlspecialchars($new_instance['google_maps_marker1_email'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_website'] = htmlspecialchars($new_instance['google_maps_marker1_website'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_extra'] = htmlspecialchars($new_instance['google_maps_marker1_extra'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_extra_link'] = htmlspecialchars($new_instance['google_maps_marker1_extra_link'], ENT_QUOTES, 'UTF-8') ;
		$instance['google_maps_marker1_latitude'] = $new_instance['google_maps_marker1_latitude'];
		$instance['google_maps_marker1_longitude'] = $new_instance['google_maps_marker1_longitude'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'google_maps_title_new' => __('Google Ads Master', 'google_maps_master'), 'google_maps_title' => true, 'google_maps_title_new' => false, 'show_google_maps_master' => false, 'google_maps_master_view_basic_choice' => false, 'google_maps_zoom' => false, 'google_maps_width' => false, 'google_maps_height' => false, 'google_maps_latitude' => false, 'google_maps_longitude' => false, 'show_google_maps_marker1' => false, 'google_maps_marker1_name' => false, 'google_maps_marker1_avatar' => false, 'google_maps_marker1_address' => false, 'google_maps_marker1_city' => false, 'google_maps_marker1_state' => false, 'google_maps_marker1_country' => false, 'google_maps_marker1_phone' => false, 'google_maps_marker1_mobile' => false, 'google_maps_marker1_email' => false, 'google_maps_marker1_website' => false, 'google_maps_marker1_extra' => false, 'google_maps_marker1_extra_link' => false, 'google_maps_marker1_latitude' => false, 'google_maps_marker1_longitude' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
		<b>Check the buttons to be displayed:</b>
		</p>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['google_maps_title'], true ); ?> id="<?php echo $this->get_field_id( 'google_maps_title' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'google_maps_title' ); ?>"><b><?php _e('Display Widget Title', 'google_maps_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'google_maps_title_new' ); ?>"><?php _e('Change Title:', 'google_maps_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'google_maps_title_new' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_title_new' ); ?>" value="<?php echo $instance['google_maps_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<h2>Map Wide Options</h2>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_google_maps_master'], true ); ?> id="<?php echo $this->get_field_id( 'show_google_maps_master' ); ?>" name="<?php echo $this->get_field_name( 'show_google_maps_master' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_google_maps_master' ); ?>"><b><?php _e('Activate Google Map', 'google_maps_master'); ?></b></label>
	</p>
	</p>
	<select id="<?php echo $this->get_field_id( 'google_maps_master_view_basic_choice' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_master_view_basic_choice' ); ?>" style="width:190px">
	<option value="<?php echo get_option('google_maps_master_load_basic_roadmap'); ?>" <?php echo get_option('google_maps_master_view_basic_choice') == 'ROADMAP' ? 'selected="selected"':''; ?>>RoadMap</option>
	<option value="<?php echo get_option('google_maps_master_load_basic_satellite'); ?>" <?php echo get_option('google_maps_master_view_basic_choice') == 'SATELLITE' ? 'selected="selected"':''; ?>>Satellite</option>
	<option value="<?php echo get_option('google_maps_master_load_basic_hybrid'); ?>" <?php echo get_option('google_maps_master_view_basic_choice') == 'HYBRID' ? 'selected="selected"':''; ?>>Hybrid</option>
	<option value="<?php echo get_option('google_maps_master_load_basic_terrain'); ?>" <?php echo get_option('google_maps_master_view_basic_choice') == 'TERRAIN' ? 'selected="selected"':''; ?>>Terrain</option>
	</select>
	<label for="<?php echo $this->get_field_id( 'google_maps_master_view_basic_choice' ); ?>"><?php _e('Map Display Type', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_zoom' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_zoom' ); ?>" value="<?php echo $instance['google_maps_zoom']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_zoom' ); ?>"><?php _e('Map Zoom', 'google_maps_master'); ?></label>
	<div class="description">Default <b>18</b>.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_width' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_width' ); ?>" value="<?php echo $instance['google_maps_width']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_width' ); ?>"><?php _e('Map Width', 'google_maps_master'); ?></label>
	<div class="description">Default <b>auto</b> for Full Mobile Responsiveness.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_height' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_height' ); ?>" value="<?php echo $instance['google_maps_height']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_height' ); ?>"><?php _e('Map Height', 'google_maps_master'); ?></label>
	<div class="description">Default <b>400</b>. You can play with this value, does not affect responsiveness.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_latitude' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_latitude' ); ?>" value="<?php echo $instance['google_maps_latitude']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_latitude' ); ?>"><?php _e('Map Latitude', 'google_maps_master'); ?></label>
	<div class="description">Example <b>32.720392</b>. Check below instructions.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_longitude' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_longitude' ); ?>" value="<?php echo $instance['google_maps_longitude']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_longitude' ); ?>"><?php _e('Map Longitude', 'google_maps_master'); ?></label>
	<div class="description">Example <b>-117.228778</b>. Check below instructions.</div>
	</p>
	<p>
	<div class="description">Map Latitude and Longitude will be used as <b>Center of your Map</b>.</div>
	<div class="description">Get Coordinates <a href="http://maps.google.com" target="_blank">Google Maps</a>. Right-click on the desired spot on the map to bring up a menu with options. Click What's here to get the latitude and longitude coordinates.</div>
	<div class="description"><a href="http://wordpress.techgasp.com/google-maps-master-documentation/" target="_blank">More about these settings</a>.</div>
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<h2>Marker 1 Options</h2>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_google_maps_marker1'], true ); ?> id="<?php echo $this->get_field_id( 'show_google_maps_marker1' ); ?>" name="<?php echo $this->get_field_name( 'show_google_maps_marker1' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_google_maps_marker1' ); ?>"><b><?php _e('Activate Map Marker 1', 'google_maps_master'); ?></b></label>
	</p>
	<select id="<?php echo $this->get_field_id( 'google_maps_marker1_basic_choice' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_basic_choice' ); ?>">
	<option>Select Marker 1 Icon</option>
	<option>Google Original Icon</option>
	<option value="<?php echo get_option('google_maps_master_load_basic_marker1'); ?>" <?php echo get_option('google_maps_marker1_basic_choice') == 'google_maps_master_load_basic_marker1' ? 'selected="selected"':''; ?>>TechGasp Original</option>
	</select>
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_basic_choice' ); ?>"><?php _e('Marker 1 Icon', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_name' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_name' ); ?>" value="<?php echo $instance['google_maps_marker1_name']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_name' ); ?>"><?php _e('Company Name', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_avatar' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_avatar' ); ?>" value="<?php echo $instance['google_maps_marker1_avatar']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_avatar' ); ?>"><?php _e('Logo 64px/64px', 'google_maps_master'); ?></label>
	<div class="description">Insert blog link to company logo your personal avatar. Size, 64px by 64px works best.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_address' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_address' ); ?>" value="<?php echo $instance['google_maps_marker1_address']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_address' ); ?>"><?php _e('Address', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_city' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_city' ); ?>" value="<?php echo $instance['google_maps_marker1_city']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_city' ); ?>"><?php _e('City', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_state' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_state' ); ?>" value="<?php echo $instance['google_maps_marker1_state']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_state' ); ?>"><?php _e('State', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_country' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_country' ); ?>" value="<?php echo $instance['google_maps_marker1_country']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_country' ); ?>"><?php _e('Country', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_phone' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_phone' ); ?>" value="<?php echo $instance['google_maps_marker1_phone']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_phone' ); ?>"><?php _e('Phone', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_mobile' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_mobile' ); ?>" value="<?php echo $instance['google_maps_marker1_mobile']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_mobile' ); ?>"><?php _e('Mobile', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_email' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_email' ); ?>" value="<?php echo $instance['google_maps_marker1_email']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_email' ); ?>"><?php _e('Email', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_website' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_website' ); ?>" value="<?php echo $instance['google_maps_marker1_website']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_website' ); ?>"><?php _e('Website', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_extra' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_extra' ); ?>" value="<?php echo $instance['google_maps_marker1_extra']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_extra' ); ?>"><?php _e('Extra Field Name', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_extra_link' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_extra_link' ); ?>" value="<?php echo $instance['google_maps_marker1_extra_link']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_extra_link' ); ?>"><?php _e('Extra Field Link', 'google_maps_master'); ?></label>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_latitude' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_latitude' ); ?>" value="<?php echo $instance['google_maps_marker1_latitude']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_latitude' ); ?>"><?php _e('Marker 1 Latitude', 'google_maps_master'); ?></label>
	<div class="description">Marker 1 Latitude. Leave empty to place marker in center of map. Same Latitude as Map Latitude.</div>
	</p>
	<p>
	<input id="<?php echo $this->get_field_id( 'google_maps_marker1_longitude' ); ?>" name="<?php echo $this->get_field_name( 'google_maps_marker1_longitude' ); ?>" value="<?php echo $instance['google_maps_marker1_longitude']; ?>" style="width:auto;" />
	<label for="<?php echo $this->get_field_id( 'google_maps_marker1_longitude' ); ?>"><?php _e('Marker 1 Longitude', 'google_maps_master'); ?></label>
<div class="description">Marker 1 Longitude. Leave empty to place marker in center of map. Same Longitude as Map Longitude.</div>
	</p>
	<p>
	<div class="description"><b>You don't need to use all Marker fields. Empty fields will auto-hide.</b></div>
<div class="description"><a href="http://wordpress.techgasp.com/google-maps-master-documentation/" target="_blank">More about these settings</a>.</div>
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b><?php echo get_option('google_maps_master_name'); ?> Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/google-maps-master/" target="_blank" title="<?php echo get_option('google_maps_master_name'); ?> Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/google-maps-master-documentation/" target="_blank" title="<?php echo get_option('google_maps_master_name'); ?> Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/google-maps-master/" target="_blank" title="Visit Website">Get Add-Ons</a></p>
	<?php
	}
 }
?>