<?php defined('_JEXEC') or die;

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

/**
 * @var Joomla\Registry\Registry $params Module parameters
 * @var string|null $easyappointments_url Easy!Appointments booking URL
 * @var string $width Iframe width
 * @var string $height Iframe height
 * @var string $provider_id Provider ID parameter
 * @var string $service_id Service ID parameter
 * @var string $style Additional iframe styles
 */

$iframeTitle = trim((string) $params->get('iframe_title', 'Easy!Appointments Booking'));
$showOpenLink = (bool) $params->get('show_open_link', 1);
$openLinkText = trim((string) $params->get('open_link_text', 'Open booking page in a new tab'));

if (!empty($easyappointments_url)) {
    $query = [];

    if ($provider_id !== '') {
        $query['provider'] = $provider_id;
    }

    if ($service_id !== '') {
        $query['service'] = $service_id;
    }

    $parts = parse_url($easyappointments_url);
    $existingQuery = [];

    if (!empty($parts['query'])) {
        parse_str($parts['query'], $existingQuery);
    }

    $finalQuery = array_merge($existingQuery, $query);
    $iframeSrc = preg_replace('/\?.*$/', '', $easyappointments_url);

    if ($finalQuery !== []) {
        $iframeSrc .= '?' . http_build_query($finalQuery);
    }
    ?>
    <div class="mod-easyappointments">
        <iframe
            src="<?= htmlspecialchars($iframeSrc, ENT_QUOTES, 'UTF-8') ?>"
            title="<?= htmlspecialchars($iframeTitle, ENT_QUOTES, 'UTF-8') ?>"
            width="<?= htmlspecialchars($width, ENT_QUOTES, 'UTF-8') ?>"
            height="<?= htmlspecialchars($height, ENT_QUOTES, 'UTF-8') ?>"
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"
            style="border:0;<?= htmlspecialchars($style, ENT_QUOTES, 'UTF-8') ?>"
        ></iframe>

        <?php if ($showOpenLink) : ?>
            <p style="margin:12px 0 0;">
                <a
                    href="<?= htmlspecialchars($iframeSrc, ENT_QUOTES, 'UTF-8') ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <?= htmlspecialchars($openLinkText, ENT_QUOTES, 'UTF-8') ?>
                </a>
            </p>
        <?php endif; ?>
    </div>
    <?php
} else {
    ?>
    <p style="color:red;">In order to render the Easy!Appointments iframe, you will need to first set the target booking URL.</p>
    <?php
}
