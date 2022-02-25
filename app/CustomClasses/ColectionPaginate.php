<?php
namespace App\CustomClasses;

use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ColectionPaginate
{
    public static function paginate(Collection $results, $pageSize)
    {
        $page = Paginator::resolveCurrentPage('page');
        
        $total = $results->count();

        return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

    }

    /**
     * Create a new length-aware paginator instance.
     *
     * @param  \Illuminate\Support\Collection  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int  $currentPage
     * @param  array  $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }
    protected static function uploadFiles($name, $path){
        $file_name = $name->getClientOriginalName();
       $type = $name->getClientOriginalExtension();
       if ($type == 'png') $file_type = '.png';
       elseif ($type == 'jpg') $file_type = '.jpg';
       else $file_type = '.jpeg';
       $file_name = md5($file_name) . $file_type;
       $file = $name;
       $file->move(public_path() . $path, $file_name); 
       return $file_name;
    }
}