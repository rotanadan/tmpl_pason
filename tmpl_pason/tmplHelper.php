<?php
/**
 * @Author  Chad Windnagle
 * @Project tmpl-pason
 * Date: 2/5/15
 */

class tmplHelper
{
    protected $menu;

    protected $template;

    public function __construct($template)
    {
        $this->menu = JFactory::getApplication()->getMenu();
        $this->template = $template;
    }

    /*
     * An array of the JS files to load
     */
    protected $delayedJS = array();

    /*
     * Add a script to the array of delayed files
     */
    public function registerDelayedScript($file)
    {
        // if the file doesn't exist don't push it into the array
        if (! $file)
        {
            return false;
        }

        $this->delayedJS[] = $file;
        return true;
    }

    /*
     * Compile javascript markup
     */

    public function getDelayedScriptsMarkup()
    {
        // make sure we have some files registered
        if (! is_array($this->delayedJS) || ! count($this->delayedJS))
        {
            return false;
        }

        $files = $this->delayedJS;

        $delayedHtml = '';

        // build markup of script sources
        foreach ($files as $file)
        {
            $delayedHtml .= '<script type="text/javascript" src="' . $file . '"></script>';
        }

        return $delayedHtml;
    }

    /*
     * Compares the default and active menu items and determines if we are on the homepage
     */
    public function isHomePage()
    {
        // get default menu
        $default = $this->menu->getDefault();
        // get active menu
        $active = $this->menu->getActive();
        if ((is_object($default) && is_object($active)) && $default == $active)
        {
            return true;
        }
        return false;
    }

    /*
     * get's the page css class
     */
    public function getPageClass()
    {
        $class = '';

        $active = $this->menu->getActive();

        if (is_object($active)) {
            $class = $active->params->get('pageclass_sfx');
        }

        return $class;
    }

    public function getSidebarClasses()
    {
        $left  = $this->hasLeftSidebar();
        $right = $this->hasRightSidebar();
        $class = '';

        if ($left)
        {
            $class .= $left;
        }

        if ($right)
        {
            $class .= ' ' . $right;
        }

        return $class;
    }

    public function hasLeftSidebar()
    {
        if ($this->template->countModules('left') || $this->template->countModules('sidebar'))
        {
            return 'hasLeft';
        }

        return false;
    }

    public function hasRightSidebar()
    {
        if ($this->template->countModules('right'))
        {
            return 'hasRight';
        }

        return false;
    }
}