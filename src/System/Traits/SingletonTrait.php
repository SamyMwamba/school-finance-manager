<?php
namespace Sfm\System\Traits;


trait SingletonTrait {

    /**
     * l'instance
     * @var self
     */
    private static $instance = null;


    /**
     * on retourne la mm instance
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
