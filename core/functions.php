<?php


// function dd($data)
// {
//     echo '<pre>';
//     return (var_dump($data));
//     echo '</pre>';
// };


// function connecttoDB()
// {
//     try {
//         $pdo = new PDO('mysql:host=localhost;dbname=mytodo', 'root', '');
//         //echo "connection ok";
//         return $pdo;
//     } catch (PDOException $e) {
//         die('could not connect' . $e->getMessage());
//     }
// }

// function fetchAllTasks($pdo)
// {
//     $statement = $pdo->prepare("select * from todos");
//     $statement->execute();
//     //$results = dd($statement->fetchAll());
//     // $results = $statement->fetchAll();
//     // var_dump($results[0][1]);
//     //$tasks = $statement->fetchAll(PDO::FETCH_OBJ);
//     // var_dump($results[0]->description);
//     return $tasks = $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
// }
$treasure_hunt = ["garbage", "cat", 99, ["soda can", 8, ":)", "sludge", ["stuff", "lint", ["GOLD!"], "cave", "bat", "scorpion"], "rock"], "glitter", "moonlight", 2.11];
print_r($treasure_hunt[3]);
