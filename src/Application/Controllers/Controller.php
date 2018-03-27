<?php
namespace Sfm\Application\Controllers;

use Sfm\Application\Application;



class Controller
{
    /**
     * le chemin vers les vues
     * @var string
     */
    protected $viewPath = APP."/Views";

    /**
     * le template par default
     * @var string
     */
    protected $layout = "default";

    /**
     * le title de page HTML
     * @var string
     */
    protected $title;

    /**
     * le title de page HTML par default
     * @var string
     */
    protected $defaultTitle  = "School Finance Manager";


    /**
     * l'application
     * @var App
     */
    protected $application;


    /**
     * l'application pour avoir acces
     * a d'autre class de l'application comme la session
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }


    /**
     * definit un layout pour une vue
     * dans le controlleur courant
     * @param string $layout
     * @return void
     */
    public function setLayout(string $layout): void
    {
        $this->layout = is_string($layout)? $layout : "default";
    }


    /**
     * definit le nom d'une vue
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = is_string($title)? $title : "School Finance Manager";
    }


    private function getTitle(): string
    {
        $title = $this->title ." | ". $this->defaultTitle;
        return $title;
    }


    /**
     * permet de rendre une vue pour le controller courant
     * @param string $view
     * @param array $variables
     * @return void
     */
    public function view(string $view, array $variables = [])
    {
        // verification des fichiers
        $view = $this->viewPath."/{$view}.php";
        $layout = $this->viewPath."/layout/{$this->layout}.php";
        $view = is_file($view)? $view : null;

        /**
         * si on veux definir des varibles global
         * accessible dans toutes les vues de l'application
         * on ajoute en clé, le nom de la varibale et en
         * valeur sa valeur.
         */
        $variables['page_title'] = $this->getTitle();
        $variables['session'] =  $this->application->getSession();

        //requirement de la vue
        if ($view !== null) {
            ob_start();
                extract($variables);
                require $view;
            $page_content = ob_get_clean();
            require is_file($layout)? $layout : $this->viewPath."/layout/default.php";
        } else {
            throw new \RuntimeException("the view {$view} is not a file");
        }
    }
}
