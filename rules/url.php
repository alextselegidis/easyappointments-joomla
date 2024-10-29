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

use Joomla\CMS\Form\FormRule;
use Joomla\Utilities\SimpleContainer;
use Joomla\CMS\Language\Text;

class JFormRuleUrl extends FormRule
{
    protected $regex = '^(https?:\/\/)?(([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})\/?$';

    public function test(SimpleXMLElement $element, $value, $group = null, SimpleContainer $input = null, JForm $form = null)
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        return true;
    }
}
