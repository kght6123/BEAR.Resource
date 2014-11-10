<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use BEAR\Resource\ResourceObject;
use Ray\Di\AbstractModule;
use Ray\Di\Injector;
use BEAR\Resource\Module\ResourceModule;
use BEAR\Resource\Module\HalModule;

bootstarp: {
    $loader = require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';
    /** @var $loader \Composer\Autoload\ClassLoader */
    $loader->addPsr4('MyVendor\\MyApp\\', __DIR__);
}

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new ResourceModule('MyVendor\MyApp'));
        $this->install(new HalModule);
    }
}

main: {
    // create resource client with HalModule
    $resource = (new Injector(new AppModule))->getInstance('BEAR\Resource\ResourceInterface');
    // request
    $news = $resource
        ->get
        ->uri('app://self/news')
        ->withQuery(['date' => 'today'])
        ->request();
    // output
    echo $news . PHP_EOL;
}