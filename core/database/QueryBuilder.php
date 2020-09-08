<?php
class QueryBuilder
{
    //public $statement;
    //public $pdo;
    protected $pdo;

    function __construct(PDO $pdo)
    {

        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        //$statement = $pdo->prepare("select * from $table");
        $statement = $this->pdo->prepare("select * from ${table}");

        $statement->execute();

        //$results = dd($statement->fetchAll());
        // $results = $statement->fetchAll();
        // var_dump($results[0][1]);
        //$tasks = $statement->fetchAll(PDO::FETCH_OBJ);
        // var_dump($results[0]->description);

        //return $statement->fetchAll(PDO::FETCH_CLASS, $someClass);
        //makes it a specific class so you can grab methods on this class
        // or we could just use std obj
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    // public function createRow($table, $nameKey, $nameValue)
    // {
    //     try {
    //         $statement = $this->pdo->prepare("INSERT INTO ${table} ($nameKey) VALUES (?)");
    //         $statement->execute([$nameValue]);
    //     } catch (Exception $e) {
    //         die("Whoops, could not add to database" . $e->getMessage());
    //     }
    // }

    public function selectOne($table, $nameKey, $nameValue)
    {
        $statement = $this->pdo->prepare("SELECT * FROM ${table} WHERE $nameKey = ?");
        $statement->execute([($nameValue)]);
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function createRow($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die("Whoops, could not add to database" . $e->getMessage());
        }
    }
    //dont use this one unless there are two criteria
    //     public function selectOne($table, $parameters)
    //     {
    //         $sql = sprintf(
    //             'SELECT * FROM %s WHERE (%s) = (%s)',
    //             $table,
    //             implode(', ', array_keys($parameters)),
    //             ':' . implode(', :', array_keys($parameters))
    //         );

    //         try {
    //             $statement = $this->pdo->prepare($sql);

    //             $statement->execute($parameters);
    //         } catch (Exception $e) {
    //             die("Whoops, could not find in database" . $e->getMessage());
    //         }
    //         return $statement->fetch(PDO::FETCH_OBJ);
    //     }
}
