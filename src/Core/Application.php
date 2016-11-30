<?php
namespace Src\Core;

use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Request;

class Application extends SilexApplication
{
    private static $actionSuffix = 'Action';

    public function __construct()
    {
        parent::__construct();
        // Set as global, so we can get EntityManager inside controllers
        $GLOBALS['app'] = &$this;
        $this->initTwig();
        $this->initializeRoutes();
        $this->exceptionHandling();
    }

    private function initTwig()
    {
        $this->register(new \Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/../../app/views',
        ));
    }

    private function initializeRoutes()
    {
        $this->addRoute('get', '/', 'index');
    }

    private function addRoute($method, $path, $action)
    {
        $controller = new ActionController();
        $function = $action . self::$actionSuffix;
        $this->$method($path, array($controller, $function));
    }

    private function exceptionHandling()
    {
        $this->error(function (\Exception $e, Request $request, $code) {
            switch ($code) {
                case 404:
                    $message = 'The requested page could not be found.';
                    break;
                default:
                    $message = 'We are sorry, but something went terribly wrong.';
            }

            return new Response($message);
        });
    }
}
