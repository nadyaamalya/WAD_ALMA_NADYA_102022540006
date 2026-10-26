
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee - Restaurant & Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="navbar">
        <h2>Restaurant & Cafe System</h2>
        <div>
            <a href="{{ route('employee.index') }}">Employee Data</a>
            <a href="{{ route('employee.create') }}">Add Employee</a>
        </div>
    </div>

    <div class="input-container">
        <div class="title">
            <h1>Edit Employee</h1>
            <p>Update restaurant employee information.</p>
        </div>

        <div class="card">
            <form method="POST"
                  action="{{ route('employee.update', $employee->id) }}">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text"
                           name="employee_id"
                           value="{{ old('employee_id', $employee->employee_id) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text"
                           name="employee_name"
                           value="{{ old('employee_name', $employee->employee_name) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text"
                           name="contact"
                           value="{{ old('contact', $employee->contact) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Job Title</label>
                    <select name="job_title" required>
                        @foreach (['Chef', 'Waiter', 'Cashier', 'Manager'] as $job)
                            <option value="{{ $job }}"
                                @selected(old('job_title', $employee->job_title) == $job)>
                                {{ $job }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="Active"
                            @selected(old('status', $employee->status) == 'Active')>
                            Active
                        </option>

                        <option value="Inactive"
                            @selected(old('status', $employee->status) == 'Inactive')>
                            Inactive
                        </option>
                    </select>
                </div>

                @if ($errors->any())
                    <div class="validation-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="button-area">
                    <button type="submit" class="btn-save">
                        Update Employee
                    </button>

                    <a href="{{ route('employee.index') }}"
                       class="btn-cancel">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>
</body>

</html>
