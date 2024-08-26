<?php
    $project_name = $_GET['project_name']; // Ми передаємо дані методом GET
    $date = $_GET['date'];

    $host = "localhost";
    $databaseName = "lb_pdo_workers";
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$host;dbname=$databaseName";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "
        SELECT 
        SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(w.time_end, w.time_start)))) AS time_spent
        FROM project p
        JOIN work w ON p.ID_PROJECTS = w.FID_PROJECTS
        WHERE w.date = :date AND p.name = :project_name
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':project_name', $project_name, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result["time_spent"]) {
            echo "Project: " . $project_name . "<br>";
            echo "Time spent:  " . $result["time_spent"] . "<br>";
        } else {
            echo "No work or no project with this data";
        }


    } catch (PDOException $error) {
        echo $error;
    }

    $pdo = null
    ?>