
<?php
include "connection.php";

$id = $_GET["id"];

$sql = "SELECT * FROM employees WHERE id = $id";
$result = mysqli_query($conn, $sql);

$employee = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $employeeId = trim($_POST["employee_id"]);
    $employeeName = trim($_POST["employee_name"]);
    $contact = trim($_POST["contact"]);
    $jobTitle = $_POST["job_title"];
    $status = $_POST["status"];

    $sql = "UPDATE employees SET
            employee_id = '$employeeId',
            employee_name = '$employeeName',
            contact = '$contact',
            job_title = '$jobTitle',
            status = '$status'
            WHERE id = $id";

    mysqli_query($conn, $sql);

    header("Location: display.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee - Restaurant & Cafe</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <h2>Restaurant & Cafe System</h2>
        <div>
            <a href="display.php">Employee Data</a>
            <a href="input.php">Add Employee</a>
        </div>
    </div>

    <div class="input-container">
        <div class="title">
            <h1>Edit Employee</h1>
            <p>Update restaurant employee information.</p>
        </div>

        <div class="card">
            <form method="POST">

                <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" name="employee_id" value="<?php echo htmlspecialchars($employee['employee_id']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" name="employee_name" value="<?php echo htmlspecialchars($employee['employee_name']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" value="<?php echo htmlspecialchars($employee['contact']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Job Title</label>
                    <select name="job_title" required>
                        <option value="Chef" <?php if ($employee["job_title"] == "Chef") echo "selected"; ?>>Chef</option>
                        <option value="Waiter" <?php if ($employee["job_title"] == "Waiter") echo "selected"; ?>>Waiter</option>
                        <option value="Cashier" <?php if ($employee["job_title"] == "Cashier") echo "selected"; ?>>Cashier</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="Active" <?php if ($employee["status"] == "Active") echo "selected"; ?>>Active</option>
                        <option value="Inactive" <?php if ($employee["status"] == "Inactive") echo "selected"; ?>>Inactive</option>
                    </select>
                </div>

                <div class="button-area">
                    <button type="submit" class="btn-save">Update Employee</button>
                    <a href="display.php" class="btn-cancel">Cancel</a>
                </div>

            </form>
        </div>
    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>
</body>

</html>
