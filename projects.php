<?php
    $project_name = $_GET['project_name']; // Ми передаємо дані методом GET

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
        SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(w.time_end, w.time_start)))) AS total_time_spent
        FROM project p
        JOIN work w ON p.ID_PROJECTS = w.FID_PROJECTS
        WHERE p.name = :project_name
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':project_name', $project_name, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result["total_time_spent"]) {
            echo "Time spent on project " . $project_name . "<br>";
            echo "Is " . $result["total_time_spent"] . " hours<br>";

        } else {
            echo "Project with name $project_name not found";
        }


    } catch (PDOException $error) {
        echo $error;
    }

    $pdo = null
    ?>