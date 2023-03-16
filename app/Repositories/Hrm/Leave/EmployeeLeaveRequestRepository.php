<?php 

namespace App\Repositories\Hrm\General;

use App\Models\Hrm\Leave\EmployeeLeaveRequest;

class EmployeeLeaveRequestRepository 
{

    public static function getAll()
    {
        return EmployeeLeaveRequest::all();
    }

    public static function get($id)
    {
        return EmployeeLeaveRequest::findOrFail($id);
    }

    public static function create($leaveType)
    {
        return EmployeeLeaveRequest::create($leaveType);
    }

    public static function update($id, $leaveType)
    {
        return EmployeeLeaveRequest::whereId($id)->update($leaveType);
    }

    public static function approve($id, $approver_id)
    {
        return EmployeeLeaveRequest::whereId($id)->update(["is_approved"=> true, "approver_id"=> $approver_id]);
    }

    public static function destroy($id)
    {
        return EmployeeLeaveRequest::destroy($id);
    }

}