<?php
/**
 * Plugin Name: Jetpack Photon For Local .dev Domains
 * Plugin URI: http://github.com/openmediabg/jetpack-photon-local-domains
 * Description: Disables image proxying and resizing by Jetpack's Photon for local .dev domains.
 * Version: 0.0.1
 * Author: Dimitar Dimitrov
 * Author URI: http://ddimitrov.name/
 * License: MIT
 */

add_filter('photon_validate_image_url', 'disable_photon_for_local_dev_domains', 10, 3);

function disable_photon_for_local_dev_domains($can_proxy_image, $image_url, $parsed_image_url) {
	if (isset($parsed_image_url['host']) && preg_match('/\.dev$/', $parsed_image_url['host'])) {
		return false;
	}

	return $can_proxy_image;
}
