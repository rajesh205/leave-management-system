<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        return LeaveRequest::with('employee')->get();
    }

    public function store(Request \$request)
    {
        \$validated = \$request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'in:pending,approved,rejected',
            'reason' => 'nullable|string',
        ]);
        return LeaveRequest::create(\$validated);
    }

    public function show(LeaveRequest \$leaveRequest)
    {
        return \$leaveRequest->load('employee');
    }

    public function update(Request \$request, LeaveRequest \$leaveRequest)
    {
        \$validated = \$request->validate([
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'status' => 'sometimes|in:pending,approved,rejected',
            'reason' => 'nullable|string',
        ]);
        \$leaveRequest->update(\$validated);
        return \$leaveRequest->load('employee');
    }

    public function destroy(LeaveRequest \$leaveRequest)
    {
        \$leaveRequest->delete();
        return response()->noContent();
    }
}
