<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work</title>
    <style>
        header {
            background-color: #FFBF00;
            padding: 1rem;
            text-align: center;
            color: white;
        }

        .container {
            display: flex;
            justify-content: space-around;
            border: 2px solid #ccc;
            padding: 15px;
            margin-top: 30px;
        }

        .tasks {
            width: 300px;
            height: 250px;
            background-color: #f0f0f0;
            margin: 10px;
            font-size: 18px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .button {
            padding: 8px 16px;
            background-color: #E49B0F;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            border: none;
        }
    </style>
</head>

<body>
    <header>
        <!-- Removed the lab title -->
    </header>
    <div class="container">
        <div class="tasks">
            <p style="padding-top: 20px;">The number of subordinates of each chief</p>
            <form action="workers.php" method="get">
                <label for="name">Chief name: </label>
                <select id="name" name="chief_name">
                    <option value="Jobs">Jobs</option>
                    <option value="Wozniak">Wozniak</option>
                    <option value="Gates">Gates</option>
                </select>
                <button type="submit" class="button">Enter</button>
            </form>
        </div>
        <div class="tasks">
            <p style="padding-top: 20px;">Total time spent on the selected project</p>
            <form action="projects.php" method="get">
                <label for="name">Project name: </label>
                <select id="name" name="project_name">
                    <option value="Project_1, Hospital">Hospital</option>
                    <option value="Project_2, Bank">Bank</option>
                    <option value="Project_3, Police">Police</option>
                </select>
                <button type="submit" class="button">Enter</button>
            </form>
        </div>
        <div class="tasks">
            <p style="padding: 20px 10px;">Information on completed tasks for the specified project on the selected date</p>
            <form action="tasks.php" method="get">
                <label for="project">Project name:</label>
                <select id="project" name="project_name">
                    <option value="Project_1, Hospital">Hospital</option>
                    <option value="Project_2, Bank">Bank</option>
                    <option value="Project_3, Police">Police</option>
                </select><br>
                <label for="dateInput">Enter date:</label>
                <input type="date" id="dateInput" name="date"><br><br>
                <input type="submit" value="Enter" class="button">
            </form>
        </div>
    </div>
</body>

</html>
