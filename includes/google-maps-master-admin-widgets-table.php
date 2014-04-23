<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class google_maps_master_admin_widgets_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
?>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="300"><legend><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'google_maps_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'google_maps_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-columnname" scope="col" width="300"><a class="button-primary" href="/wp-admin/widgets.php" title="To Widgets Page" style="float:left;">To Widgets Page</a></p></th>
			<th class="manage-column column-columnname" scope="col"><a class="button-primary" href="/wp-admin/widgets.php" title="To Widgets Page" style="float:right;">To Widgets Page</a></p></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-googlemapsmaster-admin-widget-viral.png', __FILE__); ?>" alt="<?php echo get_option('google_maps_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Google Maps Master Viral Widget</h3><p>The Widget that turns your Wordpress "virulent" by allowing people to +1 and Share your pages. Watch those visits explode and greatly <b>boost your Google SEO Rank</b>!</p><p>Looks great when published under any maps widget, remember you can always hide the widget title to get the button closer to the below widgets.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-googlemapsmaster-admin-widget-basic.png', __FILE__); ?>" alt="<?php echo get_option('google_maps_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Google Maps Master Basic Widget</h3><p>This Widget was specially designed for extremely fast page load times and small system trace. Google Maps Master Basic Widget is the professional heavy duty widget to display your business location.</p><p>Built with html5 and Google API v3 for fast page load times and perfect Google SEO. No Google Maps API key needed.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-googlemapsmaster-admin-widget-advanced.png', __FILE__); ?>" alt="<?php echo get_option('google_maps_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Google Maps Master Advanced Widget</h3><p>This is the "top of the line" business maps for Wordpress. <b>Fully Mobile Responsive</b>, this widget was specially designed to grant you full control over map options. Google Maps Master Advanced Widget allows up to 12 Markers in a single map, 10 TechGasp Designed Marker Icons and 11 customizable fields per Marker (Displays Business or Personal Logo, Name, Address, City, State, Country, Phone, Mobile, Email, Website,and Free Text Field). No Google Maps API key needed.</p><p>Check Add-ons Page.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-googlemapsmaster-admin-widget-information.png', __FILE__); ?>" alt="<?php echo get_option('google_maps_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Google Maps Master Information Widget</h3><p>The perfect widget to display the latest google maps V3 traffic, transit, weather and bicycling map informations with incredibly beautiful design. Includes 4 Information Overlays for fast and easy deployments (<b>Traffic</b>, <b>Transit</b>, <b>Bicycling</b> and <b>Incredible Weather Forecast</b>). The Weather Information contains accurate weather forecasts if you click the forecast icon, according to the zoom level of the map, it will also display real time cloud overlays. OMG!!!</p><p>Check Add-ons Page.</p></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-googlemapsmaster-admin-widget-radioactive.png', __FILE__); ?>" alt="<?php echo get_option('google_maps_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Google Maps Master Radioactive Widget</h3><p>This widget was specially designed to create incredibly beautiful and original Google Maps. Includes 4 TechGasp Designed Google Maps Overlays for fast and easy deployments (<b>Before Doomsday</b>, <b>Green Radiation</b>, <b>Blue Aftermath</b>, <b>Red Dawn</b>, <b>Orange Mushroom</b> and <b>Black Fallout</b>). It's also packed with 2 easy options so you can create your own customized Google Map Overlay. Awesome!!!</p><p>Check Add-ons Page.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-admin-widget-blank.png', __FILE__); ?>" alt="<?php echo get_option('amazon_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Suggest a Widget</h3><p>Would you like to see your widget idea added to this plugin? Just drop us a line and we will make sure it gets included in the next release.</p><p>Get in touch with TechGasp.</p></td>
		</tr>
	</tbody>
</table>
<?php
		}
}