<?php
namespace Sfm\Application\Models;


class Model
{

    protected $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }
}
