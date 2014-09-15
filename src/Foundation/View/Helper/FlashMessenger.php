<?php
/**
 * @author   Sven Friedemann <sven@erstellbar.de>
 * @license  Proprietary http://marwis.de/licence.txt
 * @link     http://marwis.de
 */

namespace Foundation\View\Helper;

use Zend\View\Helper\FlashMessenger as BasicFlashMessenger;


class FlashMessenger extends BasicFlashMessenger
{

    protected $messageCloseString = '<a href="" class="close">&times;</a></div>';
    protected $messageOpenFormat = '<div class="alert-box %s">';
    protected $messageSeparatorString = '<br>';


    public function render($namespace = \Zend\Mvc\Controller\Plugin\FlashMessenger::NAMESPACE_DEFAULT,
                           array $classes = array())
    {
        $flashMessenger = $this->getPluginFlashMessenger();
        $messages = $flashMessenger->getMessagesFromNamespace($namespace);

        // Prepare classes for opening tag
        if (empty($classes)) {
            $classes = isset($this->classMessages[$namespace]) ?
                $this->classMessages[$namespace] :
                $this->classMessages['default'];
            $classes = array($classes);
        }

        // Flatten message array
        $escapeHtml = $this->getEscapeHtmlHelper();
        $messagesToPrint = array();

        $translator = $this->getTranslator();
        $translatorTextDomain = $this->getTranslatorTextDomain();

        array_walk_recursive($messages, function ($item) use (
            &$messagesToPrint, $escapeHtml, $translator, $translatorTextDomain
        ) {
            if ($translator !== null) {
                $item = $translator->translate(
                    $item, $translatorTextDomain
                );
            }
            $messagesToPrint[] = $escapeHtml($item);
        });

        if (empty($messagesToPrint)) {
            return '';
        }

        // Generate markup
        $markup =
            sprintf($this->getMessageOpenFormat(), implode(' ', $classes));
        $markup .= implode(sprintf($this->getMessageSeparatorString(),
            implode(' ', $classes)), $messagesToPrint);
        $markup .= $this->getMessageCloseString();

        return $markup;
    }

}