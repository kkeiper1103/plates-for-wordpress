<?php
/**
 * Created by PhpStorm.
 * User: kkeiper
 * Date: 11/6/2015
 * Time: 6:52 PM
 */

namespace kkeiper1103\PlatesForWordPress\Filters;


use League\Plates\Engine;

class TemplateIncludeFilter
{
    /**
     * @var Engine
     */
    private $engine;

    /**
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param $template
     * @return bool
     */
    public function __invoke($template)
    {
        //
        $template = $this->getPlatesPath($template);

        // get the HTML for whatever is going on
        echo $this->engine->render( $template );

        // because we echo'd already, we return false so it's not double-echo'd by wordpress'
        // default `include $template` statement
        return false;
    }

    /**
     * This function converts Wordpress' full path into a plates compatible template name
     *
     * eg
     *
     * "/media/share/sites/wp-content/themes/something/single.php"
     *
     * becomes
     *
     * "single"
     *
     * @param $template
     * @return mixed
     */
    protected function getPlatesPath($template) {

        $stylesheetDir = trailingslashit(get_stylesheet_directory());

        $template = str_replace($stylesheetDir, "", $template);

        $parts = explode(".", $template);

        return current($parts);
    }
}