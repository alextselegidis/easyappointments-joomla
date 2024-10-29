<?php defined('_JEXEC') or die;

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
