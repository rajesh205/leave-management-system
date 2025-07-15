<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request \$request)
    {
        \$validated = \$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'department' => 'nullable|string'
        ]);
        return Employee::create(\$validated);
    }

    public function show(Employee \$employee)
    {
        return \$employee;
    }

    public function update(Request \$request, Employee \$employee)
    {
        \$validated = \$request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:employees,email,'.\$employee->id,
            'department' => 'nullable|string'
        ]);
        \$employee->update(\$validated);
        return \$employee;
    }

    public function destroy(Employee \$employee)
    {
        \$employee->delete();
        return response()->noContent();
    }
}
