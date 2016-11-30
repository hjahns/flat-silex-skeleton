<?php
namespace Src\Core;

class ActionController{
    /** @var \Src\Core\Application $app */
    protected $app;
    protected $twig;

    /** @SuppressWarnings(PHPMD.Superglobals) */
    public function __construct()
    {
        $this->app = $GLOBALS['app'];
        $this->twig = $this->app['twig'];
    }

    public function indexAction()
    {
        return $this->render('layout.twig');
    }

    private function render($template, $values = array())
    {
        return $this->twig->render($template, $values);
    }
}