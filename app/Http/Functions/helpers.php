<?php

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

if (! function_exists('get_menu')){
    function get_menus($id){
        $menu = \App\Models\MenuContent::where('menu_id',$id)
            ->with('children')
            ->where('parent_id', 0)
            ->orderBy('sort','ASC')
            ->get();

        return $menu;
    }
}

if (! function_exists('_file_delete')){
    /**
     *
     * @param $file
     * @param string $disk
     * @param null $path
     */
    function _file_delete($file, $disk = 'uploads',$path = null){
        if (Storage::disk($disk)->exists($path.$file)){
            Storage::disk($disk)->delete($path.$file);
        }
    }
}

if (! function_exists('api_response_array')){
    /**
     *
     *
     * @return mixed
     */
    function api_response_array(){

        $result['Response'] = [
            'status' => [
                'code' => 400,
                'description' => __('api.bad request')
            ]
        ];

        return $result;
    }
}


if (! function_exists('langs_get_code_name')){
    /**
     * @return array
     */
    function langs_get_code_name(){
        return Language::getCodeName();
    }
}

if (! function_exists('getFillable')){

    /**
     * @param $model
     * @param mixed ...$column
     * @return array
     */
    function getFillable(Model $model,...$column){
        return $column ? array_merge($model->getFillable(), $column) : $model->getFillable();
    }
}

if (! function_exists('getTranslateFillable')){

    /**
     * @param $model
     * @param mixed ...$column
     * @return array
     */
    function getTranslateFillable(Model $model,...$column){
        return $column ? array_merge($model->translatedAttributes, $column) : $model->translatedAttributes;
    }
}


if (! function_exists('column_active')){
    /**
     * @param string $column
     * @return string
     */
    function column_active($column = 'id'){
        $query = request()->query();
        $q_column = array_key_exists('column',$query) ? $query['column'] : 'id';
        return ($q_column == $column) ? 'text-warning' : '';
    }
}

if (! function_exists('sort_url')){
    /**
     * @param $column
     * @return string
     */
    function sort_url($column){

        $query = request()->query();

        $url = request()->url()."?";

        $query['column'] = $column;


        if (array_key_exists('order', $query)){

            $query['order'] = $query['order'] == 'ASC' ? 'DESC' : 'ASC';

        }else{
            $query['order'] = 'ASC';
        }

        foreach ($query as $key=>$value){
            $url .=$key ? "&".$key."=".$value : $key."=".$value;
        }

        return $url;
    }
}



if (! function_exists('setting')){

    /*
     * @param null $key
     * @param null $default
     */
    function setting($key = null, $default = null){

        $setting = Setting::value($key);

        return $setting ?? $default;
    }
}


if (! function_exists('_sessionmessage')){

    /**
     * @param null $title
     * @param null $message
     * @param null $type
     * @param bool $reload
     * @param int $reloadtime
     * @return array
     */
    function _sessionmessage($title = null,$message = null,$type = null,$reload = false, $reloadtime = 800){

        return [
            'title' => $title ?? __('Title'),
            'message' => $message ? $message : __('The operation was successful.'),
            'type'    => $type ?? 'success',
            'localtionreload'  => $reload,
            'reloadtime'    => $reloadtime
        ];
    }
}

if (! function_exists('get_setting')) {
    function get_setting($key = null) {
        $setting = Setting::where('key', $key)->first();
        if($setting)
        {
            return $setting->value;
        }
        return false;
    }
}
