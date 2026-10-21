<?php

namespace App\Classes;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Str;


class Utility
{
    public static function processSqlConditions($table_prefix, $court_id, $canSeeAllStates, $from, $to,$suppliedCourtId)
    {
        $replaceCond =array();
        $replaceArray = array();

        if (isset($from) == true) {
            $replaceArray[]=$table_prefix."created_at>='".Carbon::createFromDate($from)."'";
        }
        if (isset($to) == true) {
            $replaceArray[]=$table_prefix."created_at<'".Carbon::createFromDate($to)->addDay(1)."'";
        }
        if($canSeeAllStates && isset($suppliedCourtId)==true)
        {
            $replaceArray[]=$table_prefix."court_id =". $suppliedCourtId;
        }
        elseif($canSeeAllStates)
        {

        }
        else{
            $replaceArray[]=$table_prefix."court_id =". $court_id;
        }

        $replaceCond = implode(" and ", $replaceArray);
        
        return $replaceCond;
    }
}