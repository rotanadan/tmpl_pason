<?php
/**
 * @Author  Chad Windnagle
 * @Project tmpl-pason
 * Date: 2/5/15
 */

class tmplHelper
{
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
}