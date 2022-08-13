<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProjectController extends Controller
{
    public function create_project_page(){
        $user= User::get();
        return view('create_project',['users'=>$user]);
    }

    public function create_pro(Request $request){

        $validated = $request->validate(['project_name' => 'required','users'=>'required']);
        $users = $request->get('users');
        $selected_users = implode(',',$users);
        $project = new Project;
        $project->project_name=$request->input('project_name');
        $project->users=$selected_users;
        $project->save();
        $project_id = Project::latest()->first('id');
        return redirect('/create_issue/'.$project_id->id);
    }

    public function bug_report_page($id){
        $project = Project::where('id',$id)->pluck('id');
        // $issues=DB::table('issue__reports')->where('project_id',$id)->get();
        return view('bug_reports',['project'=>$project]);
    }

    public function delete_pro($id){
        Project::find($id)->delete();
        return redirect('/');
    }

    public function edit_project($id){
        $pro = Project::find($id);
        $user= User::get();
        return view('project_edit',['project'=>$pro,'users'=>$user]);
    }

    public function update_pro(Request $request,$id){
        $users = $request->get('users');
        $selected_users = implode(',',$users);
        $project =Project::find($id);
        $project->project_name=$request->input('project_name');
        $project->users=$selected_users;
        $project->save();
        $project_id = Project::latest()->first('id');
        return redirect('/');
    }


    /////////////////////////////USER SIDE/////////////////////////////////////



    public function user_home(){
        $projects = Project::get();
        // $projects = DB::table('projects')->get();
        return view('user_home',['projects'=>$projects]);
    }

    public function user_bug_report_page($id){
        $project = Project::where('id',$id)->pluck('id');
        return view('user_bug_reports',['project'=>$project]);
    }

}
