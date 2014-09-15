<?php
/**
 * @author   Sven Friedemann <sven@erstellbar.de>
 * @license  Proprietary http://marwis.de/licence.txt
 * @link     http://marwis.de
 */

namespace Foundation\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as OrginalFormElement;


class FormElement extends OrginalFormElement
{

    public function render(ElementInterface $element = null)
    {
        if ($element->getMessages()) {
            $element->setAttribute('class',
                'error ' . $element->getAttribute('class'));
        }

        return parent::render($element);
    }
}