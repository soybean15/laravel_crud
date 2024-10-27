<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
     public function index(Request $request){
        $query = $request->input('query');

        return view('admin.department',[
            'user'=>Auth::user(),
            'departments'=>Department::search($query)->paginate(5)
        ]);
    }

    public function destroy(Request $request){

    }
}
