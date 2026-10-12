
<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $employeeId = trim($_POST["employee_id"]);
    $employeeName = trim($_POST["employee_name"]);
    $contact = trim($_POST["contact"]);
    $jobTitle = $_POST["job_title"];
    $status = $_POST["status"];

    $sql = "INSERT INTO employees
            (employee_id, employee_name, contact, job_title, status)
            VALUES
            ('$employeeId', '$employeeName', '$contact', '$jobTitle', '$status')";

    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data - Restaurant & Cafe</title>

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

    <div class="display-container">
        <div class="display-header">
            <div>
                <h1>Staff & Employee</h1>
                <p>Manage restaurant employee information.</p>
            </div>
            <a href="input.php" class="btn-add">+ Add Employee</a>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) { ?>

                        <?php
                        $no = 1;

                        while ($employee = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($employee["employee_id"]); ?></td>
                                <td><?php echo htmlspecialchars($employee["employee_name"]); ?></td>
                                <td><?php echo htmlspecialchars($employee["contact"]); ?></td>
                                <td><?php echo htmlspecialchars($employee["job_title"]); ?></td>

                                <td>
                                    <?php if ($employee["status"] == "Active") { ?>
                                        <span class="badge active">Active</span>
                                    <?php } else { ?>
                                        <span class="badge inactive">Inactive</span>
                                    <?php } ?>
                                </td>

                                <td>
                                    <a href="edit.php?id=<?php echo $employee['id']; ?>" class="btn-edit">Edit</a>
                                    <a href="delete.php?id=<?php echo $employee['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="empty">No employee data available.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>
</body>

</html>
