<?php
namespace Sfm\System\Managers;


class ConfigManager
{

    /**
     * les configuration se trouvant dans les fichiers
     * @param string $filename
     */
    private $settings = [];

    /**
     * ConfigManager constructor
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $file = ROOT."/config/{$filename}";

        if (is_file($file)) {
            $this->settings = require $file;
        } else {
            throw new \RuntimeException("file {$file} not found");
        }
    }


    /**
     * recuperation d'une clef de configuration
     * @param string $key
     * @return void
     */
    public function get(string $key)
    {
        if (array_key_exists($key, $this->settings)) {
            return $this->settings[$key];
        } else {
            throw new \RuntimeException("undefined key {$key} is settings file");
        }
    }


    /**
     * @param string $key
     * @return boolean
     */
    public function has(string $key)
    {
        return isset($this->settings[$key]);
    }
}
