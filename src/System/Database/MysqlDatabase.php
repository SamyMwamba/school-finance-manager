<?php
namespace Sfm\System\Database;

use PDO;


class MysqlDatabase extends Database
{

    //information de connexion
    private $host;
    private $name;
    private $user;
    private $pass;


    /**
     * l'instance de pdo
     * @var PDO
     */
    private $PDO;


    /**
     * MysqlDatabase constructor
     * @param string $host
     * @param string $name
     * @param string $user
     * @param string $passowrd
     */
    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }


    /**
     * connexion a la bdd avec pdo
     * on renvoi la mm instance a chaque fois
     * ceci est donc un singleton.
     * @return PDO
     */
    public function getPDO(): PDO
    {
        if ($this->PDO === null) {
            try {
                $PDO = new PDO(
                    "mysql:Host={$this->host};dbname={$this->name}",
                    "{$this->user}",
                    "{$this->pass}"
                );

                //definition de attribut de connexion avec pdo
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $PDO->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
                $this->PDO = $PDO;

            } catch (Exception $e) {
                die("PDO : ". $e->getmessage());
            }

        }
        return $this->PDO;
    }



    /**
     * query de donnee dans la base de donnee
     * @param string $statement
     * @return mixed
     */
    public function query(string $statement)
    {

    }


    /**
     * query en mode prepre  dans la base de donnee
     * @param string $statement
     * @return mixed
     */
    public function prepare(string $statement)
    {

    }
}
