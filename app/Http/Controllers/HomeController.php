<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leave;
use Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'employee'){
            $user = Auth::user();
            return view('home', compact('user'));
        } else {
            $today=\Carbon\Carbon::today();
            $users = User::where('role', 'employee')->get();
            return view('admin.home', compact('users'));
        }
    }

    public function update(Request $request){
        $user_salary = [
            'salary' => $request->salary
        ];
        $updateevent = User::where('id',  Auth::user()->id)->update($user_salary);
        return redirect('/home')->with('status', 'Salary updated!');
    }

    // leave 

    public function apply(Request $request)
    {
        return view('leave');
    }

    public function store(Request $request)
    {
        // Leave Type : 0 = Half Day, 1 = Full Day
        Leave::create([
            'employee_id' => Auth::id(),
            'type' => $request->type,
            'date' => $request->date,
            'reason' => $request->reason,
        ]);
        $user = User::find(Auth::id());
        $user->total_leave += ($request->type == 1) ? '1' : '0.5';
        $user->save();
        return redirect('/home')->with('status', 'Leave created!');
    }
    
}
