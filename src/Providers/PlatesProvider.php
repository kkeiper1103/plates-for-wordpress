<?php
/**
 * Created by PhpStorm.
 * User: kkeiper
 * Date: 11/6/2015
 * Time: 6:15 PM
 */

namespace kkeiper1103\PlatesForWordPress\Providers;


use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Plates\Engine;

class PlatesProvider extends AbstractServiceProvider
{
    protected $provides = [
        Engine::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $engine = new Engine( get_stylesheet_directory() );

        $this->getContainer()
            ->share(Engine::class, $engine);
    }
}