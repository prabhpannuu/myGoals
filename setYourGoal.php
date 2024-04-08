<?php
    // Name: Prabhjit Singh
    // Student ID: 202104995

    include 'dbInfo.php'; 

    $goalsList = "SELECT * FROM goalsList";
    $finalList = mysqli_query($con, $goalsList);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $goal = $_POST['goal'];
        $objective = $_POST['objective'];

        $sql = "INSERT INTO goalsList (goal, objective) VALUES ('$goal', '$objective')";

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Goal added successfully!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set your Goals</title>
    <style>
        body{
            text-align: center;
            background-color: aquamarine;
        }
        table{
            width: 70%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: cyan;

        } 
        table, td, tr, th{
            border: 1px solid black;
        }
        th, td{
            padding: 10px;
        }

        form{
            background-color: aqua;
            width: 70%;
            margin: 50px auto;
            padding: 40px;
        }
        
        input, button{
            padding: 5px;
            background-color: aquamarine;
        }

    </style>
</head>
<body>
    <h1>Your Goals to accomplish</h1>
    <table>
        <tr>
            <th>Goal</th>
            <th>Objective</th>
        </tr>
        <?php
                while ($oneGoal = mysqli_fetch_assoc($finalList)) { ?>
                    <tr>
                    <td><?php echo $oneGoal['goal']; ?></td>
                    <td><?php echo $oneGoal['objective']; ?></td>
                    </tr>
                <?php } 
        ?>
    </table>
    <hr>
    <h1>Add New Goal</h1>
    <form action="#" method="post">
            <label for="goal">Goal:</label>
            <input type="text" id="goal" name="goal" required> <br><br>
            <label for="objective">Objective:</label>
            <input type="text" id="objective" name="objective" required><br><br>
        <button type="submit">Add to Your Goals</button>
    </form>

</body>
</html> 

