<?php defined("_JEXEC") or die();

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Online Appointment Scheduler
 *
 * @package     EasyAppointmentsJoomla
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

if (isset($easyappointments_url) && !empty($easyappointments_url)) {
    $iframe_src = htmlspecialchars($easyappointments_url, ENT_QUOTES, "UTF-8");
    if (!empty($provider_id)) {
        $iframe_src .= "?provider=" . urlencode($provider_id);
    }
    if (!empty($service_id)) {
        $iframe_src .= "&service=" . urlencode($service_id);
    }

    echo '<iframe src="' .
        $iframe_src .
        '" width="' .
        htmlspecialchars($width, ENT_QUOTES, "UTF-8") .
        '" height="' .
        htmlspecialchars($height, ENT_QUOTES, "UTF-8") .
        '" style="border:0;' .
        htmlspecialchars($style, ENT_QUOTES, "UTF-8") .
        '"></iframe>';
} else {
    echo '<p style="color:red;">In order to render the Easy!Appointments iframe, you will need to first set the target booking URL.</p>';
}
