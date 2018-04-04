<?php
namespace Sfm\Application\Entity;


class Entity
{

    /**
     * renvoi une key non definit
     * @param string $key
     * @return mixed
     */
    public function __get(string $key)
    {
        $method = "get". ucfirst($key);

        if (method_exists($this, $method)) {
            $this->$key = $this->$method();
            return $this->$key;
        }
        throw new \RuntimeException("the method {$methode} does not exist");
    }
}
