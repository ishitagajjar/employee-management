<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leave;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salary(Request $request){
        $user_id = $request->id;
        $today=\Carbon\Carbon::today();
        $user = User::find($user_id);
        $leaves = Leave::where('employee_id', $user_id)
                ->whereBetween('date',[
                $today->startOfMonth()->format('Y-m-d'),
                $today->endOfMonth()->format('Y-m-d')
            ])->get();
        $total_leave = 0;
        // Total leaves of current month
        foreach ($leaves as $items) {
            (float)$total_leave += ($items->type == 1) ? (int)('1') : (float)(0.5);
        }
        // Consider Per Month 28 days will count
        $per_day_salary = $user->salary / 28;
        $total_salary = round($per_day_salary * (28 - $total_leave), 2);
        return view('admin.salary-details', compact('total_leave', 'user', 'total_salary'));
    }
}
