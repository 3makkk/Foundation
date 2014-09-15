<?php
/**
 * @author   Sven Friedemann <sven@erstellbar.de>
 * @license  Proprietary http://marwis.de/licence.txt
 * @link     http://marwis.de
 */
namespace Foundation;

/**
 * @author   Sven Friedemann <sven@erstellbar.de>
 * @license  Proprietary http://marwis.de/licence.txt
 * @link     http://marwis.de
 */
class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
