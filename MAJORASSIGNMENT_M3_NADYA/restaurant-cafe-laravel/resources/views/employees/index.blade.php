
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data - Restaurant & Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="navbar">
        <h2>Restaurant & Cafe System</h2>
        <div>
            <a href="{{ route('employee.index') }}">Employee Data</a>
            <a href="{{ url('/employees/create') }}">Add Employee</a>
        </div>
    </div>

    <div class="display-container">
        <div class="display-header">
            <div>
                <h1>Staff & Employee</h1>
                <p>Manage restaurant employee information.</p>
            </div>

            <a href="{{ url('/employees/create') }}" class="btn-add">
                + Add Employee
            </a>
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
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->employee_name }}</td>
                            <td>{{ $employee->contact }}</td>
                            <td>{{ $employee->job_title }}</td>

                            <td>
                                @if ($employee->status == 'Active')
                                    <span class="badge active">Active</span>
                                @else
                                    <span class="badge inactive">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('employee.edit', $employee->id) }}"
                                   class="btn-edit">
                                    Edit
                                </a>
                                
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete">
                                        Delete
                                    </button>
                                </form>
                        
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                No employee data available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>
</body>

</html>
