<?php
namespace Sfm\System\Managers;

use Sfm\System\Traits\SingletonTrait;

class SessionManager
{

    use SingletonTrait;

    /**
     * SessionManager constructor
     * initialise la session seulement si elle
     * n'a pas etait demarer
     * et nom la session par rapport au de l'application
     */
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name("SFM_session");
            session_start();
        }
    }


    /**
     * retroune la clef d'une session
     * @param string $key
     * @return void
     */
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        } else {
            throw \RuntimeException("undefined key {$key} in SESSION");
        }
    }


    /**
     * definit une clef dans la session
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /**
     * renseigne si une clef est definit
     * @param string $key
     * @return boolean
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }


    /**
     * supprime une clef en session
     * @param string $key
     * @return void
     */
    public function delete(string $key)
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        } else {
            throw \RuntimeException("cannot delete undefined key {$key}");
        }
    }
}
