<?php
namespace Sfm\Application;

use Sfm\System\Traits\SingletonTrait;
use Sfm\System\Managers\ConfigManager;
use Sfm\System\Managers\SessionManager;
use Sfm\System\Database\MysqlDatabase;



class Application
{

    use SingletonTrait;

    /**
     * l'instance de notre gestionnaire
     * de base de donnee.
     * @var MysqlDatabase
     */
    private $database;


    /**
     * retourne une instance du gestionnaire de la bdd
     * gestionnaire qui sera utiliser dans les models
     * @return MysqlDatabase
     */
    public function getDatabase(): MysqlDatabase
    {
        if ($this->database === null){
            $config = new ConfigManager(ROOT."/config/database.php");
            $database = new MysqlDatabase(
                $config->get('host'),
                $config->get('name'),
                $config->get('user'),
                $config->get('pass')
            );
            $this->database = $database;
        }
        return $this->database;
    }


    /**
     * factory pour les controllers
     * cette method renvoi l'instance du controller voulu
     * @param string $name
     * @return void
     */
    public function getController(string $name)
    {
        $controller = "Sfm\\Application\\Controllers\\{$name}Controller";
        if (class_exists($controller, true)) {
            return new $controller(self::getInstance());
        }

        throw new \RuntimeException("the class {$class} does not exist");
    }


    /**
     * factory pour les models
     * cette method renvoi l'instance du model voulu
     * @param string $name
     * @return void
     */
    public function getModel(string $name)
    {
        $model = "Sfm\\Application\\Models\\{$name}Model";
        if (class_exists($model, true)) {
            return $model(self::getInstance($this->getDatabase()));
        }

        throw new \RuntimeException("the class {$class} does not exist");
    }


    /**
     * sessionManager factory
     * @return SessionManager
     */
    public function getSession()
    {
        return SessionManager::getInstance();
    }



    public static function redirect(string $url)
    {
        header("Location:{$url}");
        exit();
    }


}
