<?php
/**
 * Created by PhpStorm.
 * User: kkeiper
 * Date: 11/5/2015
 * Time: 9:41 PM
 */

namespace kkeiper1103\PlatesForWordPress;


use kkeiper1103\PlatesForWordPress\Filters\TemplateIncludeFilter;
use kkeiper1103\PlatesForWordPress\Providers\PlatesProvider;
use League\Container\Container;
use League\Container\ReflectionContainer;

class Plugin extends Container
{
    /**
     *
     */
    public function __construct() {
        parent::__construct();

        // wire autodelegates
        $this->delegate(new ReflectionContainer);

        // share the "Plugin" class as the container class
        $this->share(Container::class, $this);

        // bind providers
        $this->registerProviders();
    }

    /**
     *
     */
    private function registerProviders()
    {
        $this->addServiceProvider(PlatesProvider::class);
    }

    /**
     *
     */
    public function run()
    {
        add_filter("template_include", $this->get(TemplateIncludeFilter::class));
    }
}