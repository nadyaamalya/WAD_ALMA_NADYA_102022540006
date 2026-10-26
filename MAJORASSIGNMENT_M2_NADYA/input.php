
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

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
            <h1>Add Employee</h1>
            <p>Enter restaurant employee information.</p>
        </div>

        <div class="card">
            <form method="POST" action="display.php">

                <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" name="employee_id" placeholder="Example: EMP001" required>
                </div>

                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" name="employee_name" placeholder="Enter employee name" required>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" placeholder="Example: 081234567890" required>
                </div>

                <div class="form-group">
                    <label>Job Title</label>
                    <select name="job_title" required>
                        <option value="">Select Job Title</option>
                        <option value="Chef">Chef</option>
                        <option value="Waiter">Waiter</option>
                        <option value="Cashier">Cashier</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="button-area">
                    <button type="submit" class="btn-save">Save Employee</button>
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
