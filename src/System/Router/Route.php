<?php
namespace Sfm\System\Router;

use Sfm\Application\Application;


class Route
{

    /**
     * l'uri demander
     * @var string
     */
    private $uri;


    /**
     * le callback a appeller si une route match
     * @var callable|string
     */
    private $callable;


    /**
     * les parametres pour les urls avec parametre
     * @var string
     */
    private $matches;


    /**
     * l'application qui va nous permettre d'instancier
     * les controllers pour le router
     * @var App $application
     */
    private $application;

    /**
     * Route Constructor
     * @param stirng $uri
     * @param callable|string $callable
     */
    public function __construct(string $uri, $callable, Application $application)
    {
        $this->uri = trim($uri, "/");
        $this->callable = $callable;
        $this->application = $application;
    }


    /**
     * verifie si une route correspond a l'uri demander
     * @param string $uri
     * @return boolean
     */
    public function match(string $uri): bool
    {
        //cas des urls avec param
        $path = preg_replace("#:([\W]+)#", "#([^/]+)#", $this->uri);
        $regex = "#{$path}#i";

        if (preg_match($regex, $uri, $matches)) {
            $matches = array_shift($matches);
            $this->matches = $matches;
            return true;
        }
        return false;
    }


    public function call()
    {
        if (is_string($this->callable)) {
            $controller = explode("#", $this->callable);
            $method = $controller[1] ?? "index";
            $controller = $this->application->getController($controller[0]);

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], [$this->matches]);
            } else {
                throw new \RuntimeException("the {$controller} does not have the method {$method}");
            }

        } elseif (is_callable($this->callable)) {
            call_user_func_array($this->callable, $this->matches);

        } else {
            throw new \InvalidArgumentException('the $callable must be a string or a callable');
        }
    }
}
