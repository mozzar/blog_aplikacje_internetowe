<?php
namespace App\Helpers;

class SeperateThreePosts{



    public static function separate($posts){
        $posts_count = ceil(count($posts)/3); //mamy 6 postow wiec 2 działy
        $posts_sorted = [];
        for($i=0; $i < $posts_count; $i++){
            $posts_sorted[$i] = [
                $posts[$i*3],
                $posts[($i*3)+1],
                $posts[($i*3)+2]
            ];

        }
        return $posts_sorted;
    }



}



?>