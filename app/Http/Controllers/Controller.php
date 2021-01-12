<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function upload( Request $request , $dir , $columns=['image'] , $allowedExtensions = [ 'png' , 'jpeg' , 'jpg' ] , $definedName = null )
    {
        foreach( $columns as $column )
        {
            $resize = false;

            if( is_array( $column ) )
            {
                $resize = true;
                $column = $column[ 0 ];
            }

            $name = $definedName ? $definedName : md5( time() . $column . uniqid() );

            if( isset( $_FILES[ $column ] ) && strlen( $_FILES[ $column ][ 'name' ] ) && strlen( $_FILES[ $column ][ 'tmp_name' ] ) )
            {
                $file = $_FILES[ $column ];
                $img  = $file[ 'name' ];
                $tmp  = $file[ 'tmp_name' ];
                $ext  = strtolower( pathinfo( $img , PATHINFO_EXTENSION ) );

                if( in_array( $ext , $allowedExtensions ) )
                {
                    $fileName = $name . '.' . $ext;

                    if( $resize )
                    {
                        $fileName_ = $name . '_avatar.' . $ext;

                        if( $ext == 'jpg' || $ext == 'jpeg' ) $src = imagecreatefromjpeg( $tmp );

                        else  $src = imagecreatefrompng( $tmp );

                        list( $width , $height ) = getimagesize( $tmp );

                        $width_ = 360;

                        $height_ = intval( ( $width_ * $height ) / $width );

                        $new_img = imagecreatetruecolor( $width_ , $height_ );

                        imagecopyresampled( $new_img , $src , 0 , 0 , 0 , 0 , $width_ , $height_ , $width , $height );

                        imagejpeg( $new_img , public_path( 'uploads' ) . '/' . $dir . '/' . $fileName_ , 100 );
                    }

                    move_uploaded_file( $tmp , public_path( 'uploads' ) . '/' . $dir . '/' . $fileName );
                    return $dir . '/' . $fileName;
                }
            }
        }
    }
}
