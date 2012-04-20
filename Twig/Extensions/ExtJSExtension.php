<?php

namespace QArea\ExtJSHelperBundle\Twig\Extensions;

use Symfony\Component\HttpKernel\Kernel;

/**
 * Twig extension for ExtJS Helper.
 *
 * @author Bogdan Tkachenko <bogus.weber@gmail.com>
 */
class ExtJSExtension extends \Twig_Extension
{
    /**
     * ExtJS root directory.
     *
     * @var string
     */
    private $_root;

    /**
     * ExtJS main file.
     *
     * @var string
     */
    private $_type;

    /**
     * @param string $root ExtJS root directory
     * @param string $type ExtJS main file name
     */
    public function __construct($root, $type)
    {
        $this->_root = $root;
        $this->_type = $type;
    }

    /**
     * Get extension exported functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'extjs' => new \Twig_Function_Method($this, 'extjs')
        );
    }

    /**
     * Get HTML code that enables ExtJS.
     *
     * @return string
     */
    public function extjs($type)
    {
        if ($type === 'js') {
            return $this->_root . $this->_type . '.js';
        } else if ($type === 'css') {
            return $this->_root . 'resources/css/ext-all.css';
        }

        return '';
    }

    /**
     * Get extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'extjs_extension';
    }
}