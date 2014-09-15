<?php
/**
 * @author   Sven Friedemann <sven@erstellbar.de>
 * @license  Proprietary http://marwis.de/licence.txt
 * @link     http://marwis.de
 */

namespace Foundation\Form\View\Helper;

use Zend\Form\View\Helper\FormElementErrors as OriginalFormElementErrors;


class FormElementErrors extends OriginalFormElementErrors
{

    protected $messageCloseString = '</small>';
    protected $messageOpenFormat = '<small class="error">';
    protected $messageSeparatorString = '<br>';

}