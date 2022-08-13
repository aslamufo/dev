<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Project;
use App\Models\Issue_Report;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Livewire\WithPagination;

class Buglist extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $issueid;
    public $status;
    public $value = "null";
    public $projectid;
    public $dev_remark;

    public function changeEvent($value, $id)
    {

        $array = Issue_Report::find($id);
        if ($value != '') {
            if ($value == 'Pending') {
                $array->ufo_status = $value;
                $array->dev_status = '';
                $array->save();
            } else {
                $array->ufo_status = $value;
                $array->save();
            }

            $this->status = $value;
            $this->a = $array->project_id;

            $this->iftrue = false;
        }
    }

    public function delete_bug($id, Request $request)
    {
        Issue_Report::find($id)->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Issue Deleted Successfully!']
        );
    }

    public function render()
    {
        
        $project = Project::find($this->projectid);
        $issues = Issue_Report::where('project_id', $this->projectid)->paginate(5);
        return view('livewire.buglist', ['project' => $project, 'issues' => $issues]);
    }


    public function saveRemark($id)
    {
        $array = Issue_Report::find($id);
        $array->dev_remark = $this->dev_remark;
        $array->save();
    }

    public function change_dev_status($value, $id)
    {

        $array = Issue_Report::find($id);
        if ($value != '') {
            if ($value == 'Completed') {
                $array->dev_status = $value;
                $array->ufo_status = 'Testing';
                $array->save();
            } else {
                $array->dev_status = $value;
                $array->ufo_status = 'Pending';
                $array->save();
            }
            $this->status = $value;
            $this->a = $array->project_id;

            $this->iftrue = false;
        }
    }

    public $date;

    public function change_dev_date($id,$date)
    {
        $array = Issue_Report::find($id);
        $array->delivery_date = str($date);
        $array->save();
    }
}
