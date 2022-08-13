<?php

namespace App\Http\Controllers;

use App\Models\Issue_Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

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
        $user_id = Auth::user()->id;
        $projects = Project::get();
        $user_ids = array();
        $total = array();
        $pending = array();
        foreach($projects as $project){
            $arrya = explode(',',$project->users);
            if(Auth::user()->role == 'Admin'){
                $user_ids[]= $project->id;
                $tot = Issue_Report::where('project_id',$project->id);
                $total[] = $tot->count();
                $pend = Issue_Report::where('project_id',$project->id)->where('ufo_status','pending');
                $pending[] = $pend->count();
            }
            elseif(in_array($user_id,$arrya)){
                $user_ids[]= $project->id;
                $tot = Issue_Report::where('project_id',$project->id);
                $total[] = $tot->count();
                $pend = Issue_Report::where('project_id',$project->id)->where('ufo_status','pending');
                $pending[] = $pend->count();
            }
        }
        $projects = Project::whereIn('id',$user_ids)->get();
        return view('home',['projects'=>$projects,'total'=>$total, 'pending'=>$pending]);
    }
}
