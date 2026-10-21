<?php

namespace App\Http\Resources;

use App\Http\Controllers\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DashboardSettingResource extends JsonResource
{
    public function processSql($sql, $court_id, $canSeeAllStates, $filterEnabled = false)
    {

        if($canSeeAllStates)
        {
            $sql = Str::replace("{addWhere}", "", $sql);
            $sql = Str::replace("{addCondition}", "", $sql);    
        }
        else{
            $sql = Str::replace("{addWhere}", "Where aa.court_id = $court_id", $sql);
            $sql = Str::replace("{addCondition}", " and aa.court_id = $court_id", $sql);
        }

        return $sql;
    }
    
    public function processSqlFilter($sql, $court_id, $canSeeAllStates,  $from, $to,$suppliedCourtId)
    {
        $replaceCond =array();
        $replaceArray = array();

        if (isset($from) == true) {
            $replaceArray[]="aa.created_at>='".Carbon::createFromDate($from)."'";
        }
        if (isset($to) == true) {
            $replaceArray[]="aa.created_at<'".Carbon::createFromDate($to)->addDay(1)."'";
        }
        if($canSeeAllStates && isset($suppliedCourtId)==true)
        {
            $replaceArray[]="aa.court_id =". $suppliedCourtId;
        }
        elseif($canSeeAllStates)
        {

        }
        else{
            $replaceArray[]="aa.court_id =". $court_id;
        }

        $replaceCond = implode(" and ", $replaceArray);
        // $replaceCond1 = " and ".implode(" and ", $replaceArray);
        
        $sql = Str::replace("{addWhere}", " Where $replaceCond", $sql);
        $sql = Str::replace("{addCondition}", " and $replaceCond", $sql);

        ///Log::alert($sql);
        return $sql;
    }

    
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $user = auth()->user()->load('employee', 'privileges'); // get user employee details and privileges NOTE: privilege assigned to a user can be more than one
        // $privileges = $user->privileges;
        // $targetPrivilegeNames = ['Super Administrator', 'Chief Registrar', 'Revenue Administrator'];
        // $canSeeAllStates = AdminController::hasPrivileges($privileges, $targetPrivilegeNames); // check if user can see from all states

        // $varFrom = $request->get("from");
        // $varTo = $request->get("to");
        // $varCourt = $request->get("court_id");
        // if (isset($varFrom) || isset($varTo) || isset($varCourt) ) {
        //     $sql = $this->processSqlFilter($this->chart->sql_query, $user->employee->court_id, $canSeeAllStates, $varFrom, $varTo, $varCourt);
        //     $data = DB::select($sql);
        // }
        // else
        // {
        //     $sql = $this->processSql($this->chart->sql_query, $user->employee->court_id, $canSeeAllStates);
        //     $data = DB::select($sql);
        // }
        return [
            'id' => $this->id,
            'chart_title' => $this->chart_title,
            'is_active' => $this->is_active,
            'orderby' => $this->orderby,
            'is_group' => $this->is_group,
            'sub_module_id' => $this->sub_module_id,
            'chart_id' => $this->chart_id,
            'data' => DB::select($this->chart->sql_query),
            'filterColumn' => $this->chart->filterColumn,
            'module_id' => $this->module_id,
            'chart_type_id' => $this->chart_type_id,
            'chart_type' => $this->chartType->chart_type,
            'chart_category_id' => $this->chart_category_id,
            'chart_category' => $this->chartCategory->chart_category,
            'column_width' => $this->column_width,
        ];
    }
}
