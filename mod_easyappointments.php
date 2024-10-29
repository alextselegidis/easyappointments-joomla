<?php defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$easyappointments_url = $params->get('easyappointments_url');
$width = $params->get('width', '100%');
$height = $params->get('height', '600px');
$provider_id = $params->get('provider_id', '');
$service_id = $params->get('service_id', '');
$style = $params->get('style', '');

if (filter_var($easyappointments_url, FILTER_VALIDATE_URL) === false) {
    $easyappointments_url = null;
}

require JModuleHelper::getLayoutPath('mod_easyappointments');
