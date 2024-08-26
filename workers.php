<?php
$chief_name = $_GET["chief_name"];
try {
    // Establish a connection to the database using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=lb_pdo_workers", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query with a placeholder for the chief's name
    $sql = "
        SELECT d.chief, COUNT(w.ID_WORKER) AS worker_count
        FROM department d
        JOIN worker w ON d.ID_DEPARTMENT = w.FID_DEPARTMENT
        WHERE d.chief = :chief
        GROUP BY d.chief;
    ";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the placeholder to the actual chief's name
    
    $stmt->bindParam(':chief', $chief_name, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display the result
    if ($result) {
        echo "Chief: " . $result['chief'] . "<br>";
        echo "Number of workers: " . $result['worker_count'] . "<br>";
    } else {
        echo "No workers found for the chief named '$chief_name'.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
