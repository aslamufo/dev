<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Issue_Report;


class IssueReportController extends Controller
{
    public function index($id){

        $project = Project::find($id);
        return view('create_issue',['project'=>$project]);
    }
    public function create_issue(Request $request,$id){
        $issues = new Issue_Report;
        $issues->issue_title=$request->issue_title;
        $issues->issue_category=$request->issue_category;
        $issues->issue_location=$request->issue_location;

        $issues->issue_category=$request->issue_category;

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image_path = $request->file('image')->store('image', 'public');
        $issues->image=$image_path;

        $issues->url=$request->url;
        $issues->priority=$request->priority;
        $issues->issue_category=$request->issue_category;
        $issues->project_id=$id;
        $issues->description=$request->description;
        $issues->save();
        return redirect('/bug_reports/'.$id);

    }

    public function delete_issue($id,$pid){
        Issue_Report::find($id)->delete();
        return redirect('/bug_reports/'.$pid);
    }

    public function edit_issue($id,$pid){
        $issue = Issue_Report::find($id);
        $projects = Project::find($pid);
        return view("edit_bugs",['issue'=>$issue,'project'=>$projects]);
    }

    public function update_issue(Request $request,$id,$pid){
        $issues = Issue_Report::find($id);
        $issues->issue_title=$request->issue_title;
        $issues->issue_category=$request->issue_category;
        $issues->issue_location=$request->issue_location;

        $issues->issue_category=$request->issue_category;
        if(!$request->file('image')==null){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
    
            $image_path = $request->file('image')->store('image', 'public');
            $issues->image=$image_path;
        }
        

        $issues->url=$request->url;
        $issues->priority=$request->priority;
        $issues->issue_category=$request->issue_category;
        $issues->project_id=$pid;
        $issues->description=$request->description;
        echo $issues->save();
        return redirect('/bug_reports/'.$pid);

    }


}
