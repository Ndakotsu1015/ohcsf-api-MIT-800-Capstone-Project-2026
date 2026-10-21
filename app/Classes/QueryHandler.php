<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;

class QueryHandler
{
    public static function filterList($filters, $query, $table="", $except=array())
    {
        if(is_array($filters)){
            if ($filters[1] == 'and') {
                // if($filters[0][0]=='id' && $table!='')
                // {
                //     $filters[0][0] =$table.$filters[0][0];
                // }

                for($i = 0; $i < count($filters); $i += 2){
                    // Nested filters with 'and' operator
                    if(count($except)>0)
                    {
                        $search = $filters[$i][0];
                        $result = array_filter($except, function($subArray) use ($search) {

                            //Log::alert($subArray);
                            return isset($subArray['column']) && $subArray['column'] === $search;
                        });
                        Log::alert($result);
                        if($result)
                            $filters[$i][0] =$result[0]['table'].$filters[$i][0];
                        else
                            $filters[$i][0] =$table.$filters[$i][0];
                    }
                    else
                        $filters[$i][0] =$table.$filters[$i][0];
                    self::applyFilter($filters[$i], $query);
                }

            } else {
                // Simple filter array
                $search = $filters[0];
                $result = array_filter($except, function($subArray) use ($search) {

                    //Log::alert($subArray);
                    return isset($subArray['column']) && $subArray['column'] === $search;
                });

                if($result)
                    $filters[0] =$result[0]['table'].$filters[0];
                else
                    $filters[0] =$table.$filters[0];

                self::applyFilter($filters, $query);
            }
        }
    }

    public static function applyFilter($filter, $query){
        $field = $filter[0];
        $operator = $filter[1];
        $value = $filter[2];

        switch ($operator) {
            case '=':
                $query->where($field, $value);
                break;
            case 'contains':
                $query->where($field, 'like', '%'.$value.'%');
                break;
            case 'notcontains':
                $query->where($field, 'not like', '%'.$value.'%');
                break;
            case 'startswith':
                $query->where($field, 'like', $value.'%');
                break;
            case 'endswith':
                $query->where($field, 'like', '%'.$value);
                break;
            case '<>':
                $query->where($field, '!=', $value);
                break;
            case '>=':
                $query->where($field, '>=', $value);
                break;
            case '<':
                $query->where($field, '<', $value);
                break;
        }
    }

    public static function sort($sortParameters, $query){
        foreach ($sortParameters as $sortItem) {
            $field = $sortItem['selector'];
            $direction = $sortItem['desc'] ? 'desc' : 'asc';
            $query->orderBy($field, $direction);
        }
    }
}
