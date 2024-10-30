<?php

// Get the update_plugins transient to see what plugins will need an update
$update_plugins = get_site_transient( 'update_plugins' );	

// Check if the response is not empty. The response is the plugins array
if ( ! empty( $update_plugins->response ) ) {

	echo '<table><tr><th>';
	_e( 'Plugin Name', 'maintenance-snippets' );
	echo '</th>	<th>';
	_e( 'Old Version', 'maintenance-snippets' );
	echo '</th><th>';
	_e( 'Updated Version', 'maintenance-snippets' );
	echo '</th></tr>';

	foreach ($update_plugins->response as $plugin) {

		$plugins_dir_path = plugin_dir_path(  __DIR__  );

		$plugins_to_update = get_plugin_data( $plugins_dir_path . $plugin->plugin );

		$plugin_name_to_be_updated 	= $plugins_to_update['Name'];
		$plugin_current_version		= $plugins_to_update['Version'];
		$plugin_latest_version		= $plugin->new_version;

		echo '<tr>
				<td>' . $plugin_name_to_be_updated . '</td>
				<td>' . $plugin_current_version . '</td>
				<td>' . $plugin_latest_version . '</td>
			  </tr>';
	}

	echo '</table>';
} else {
	_e( 'There is no plugin to be updated.', 'maintenance_snippets' );
}
