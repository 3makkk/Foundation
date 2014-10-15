<?php
/**
 * FormElementTest.php File
 *
 * @category FoundationTest\Form\View\Helper
 * @package  FoundationTest\Form\View\Helper
 * @author   Sven Friedemann <sven.friedemann@gmx.de>
 * @license  http://gesichtsbar.de/licence.txt Proprietary
 * @link     http://default.de
 */

namespace FoundationTest\Form\View\Helper;

use Zend\Form\Element;
use Zend\Form\View\HelperConfig;
use Foundation\Form\View\Helper\FormElement as FormElementHelper;
use Zend\View\Helper\Doctype;
use Zend\View\Renderer\PhpRenderer;

class FormElementTest extends \PHPUnit_Framework_TestCase {

	public $helper;
	public $renderer;

	public function setUp()
	{
		$this->helper = new FormElementHelper();

		Doctype::unsetDoctypeRegistry();

		$this->renderer = new PhpRenderer;
		$helpers = $this->renderer->getHelperPluginManager();
		$config  = new HelperConfig();
		$config->configureServiceManager($helpers);

		$this->helper->setView($this->renderer);
	}

	public function testRendersOnErrorAsEspected()
	{
		$element = new Element('testElement');
		$element->setAttribute('value', 'Initial Content');
		$element->setMessages(array('testElement' => 'no valid'));

		$markup = $this->helper->render($element);
		$this->assertContains('error', $markup);
	}

}
 