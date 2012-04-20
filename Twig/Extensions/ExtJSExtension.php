<?php

namespace QArea\ExtJSHelperBundle\Twig\Extensions;

/**
 * Twig extension for ExtJS Helper.
 *
 * @author Bogdan Tkachenko <bogus.weber@gmail.com>
 */
class ExtJSExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    private $_root;

    /**
     * @var string
     */
    private $_type;

    /**
     * @var string
     */
    private $_theme;

    /**
     * @param string $root
     * @param string $type
     * @param string $theme
     */
    public function __construct($root, $type, $theme)
    {
        $this->_root = $root;
        $this->_type = $type;
        $this->_theme = $theme;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'extjs_js' => new \Twig_Function_Method($this, 'extjs_js'),
            'extjs_css' => new \Twig_Function_Method($this, 'extjs_css')
        );
    }

    /**
     * @param null $type
     *
     * @return string
     */
    public function extjs_js($type = null)
    {
        $type = $type ?: $this->_type;

        return $this->_root . $type . '.js';
    }

    /**
     * @param null $theme
     *
     * @return string
     */
    public function extjs_css($theme = null)
    {
        $theme = $theme ?: $this->_theme;
        if ($theme) {
            $css = "ext-all-$theme.css";
        } else {
            $css = 'ext-all.css';
        }

        return $this->_root . 'resources/css/' . $css;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'extjs_extension';
    }
}