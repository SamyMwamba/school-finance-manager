<?php
namespace Sfm\System\Router;

use Sfm\Application\Application;


class Router
{

    /**
     * la route demander
     * @var string $uri
     */
    private $uri;

    /**
     * les differantes routes
     * routes ici et un objet
     * @var Route[]
     */
    private $routes = [];

    /**
     * l'application qui va nous permettre d'instancier
     * les controllers pour le router
     * @var App $application
     */
    private $application;


    public function __construct(string $uri, Application $application)
    {
        $this->uri = $uri;
        $this->application = $application;
    }


    /**
     * permet de cree une route
     *
     * @param string $uri
     * @param callable|string $callable
     * @param string $method
     * @return Route
     */
    private function add(string $uri, $callable, string $method)
    {
        $route = new Route($uri, $callable, $this->application);
        $this->routes[$method][] = $route;
    }


    /**
     * renseigne les uri de request GET et POST
     *
     * @param string $uri
     * @param callable|string $callable
     * @return void
     */
    public function any(string $uri, $callable)
    {
        $route = new Route($uri, $callable, $this->application);
        $this->routes["GET"][] = $route;
        $this->routes["POST"][] = $route;
    }


    /**
     * renseigne les uri de request GET
     *
     * @param string $uri
     * @param string|callable $callable
     * @return void
     */
    public function get(string $uri, $callable)
    {
        $this->add($uri, $callable, "GET");
    }


    /**
     * renseigne les uri de request POST
     *
     * @param string $uri
     * @param callable|string $callable
     * @return void
     */
    public function post(string $uri, $callable)
    {
        $this->add($uri, $callable, "POST");
    }


    /**
     * lancement du routing
     *
     * @return void
     */
    public function run()
    {
        if (isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {

            if (strlen($this->uri) > 1 && $this->uri[-1] == "/") {
                $redirect_url = substr($this->uri, 0, -1);
                $this->application::redirect("/{$redirect_url}");
            }

            foreach($this->routes[strtoupper($_SERVER['REQUEST_METHOD'])] as $route) {
                if ($route->match($this->uri)) {
                    return $route->call();
                }
            }

            throw new \RuntimeException("no matched routes");

        } else {
            throw new \RuntimeException("undefined server request method");
        }
    }
}
