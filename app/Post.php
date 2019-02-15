<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      public function comments(){

       return $this->hasMany(Comment::class); //looks through the comment table to find a record that has something similar with the post table and returns it, for us the post_id  in the comment table has a value similar to the id in the post table
       
      }
      public function user(){
            return $this->belongsTo(User::class);
      }

      public function addComment(){
            
      }


      public static function archieve(){
          return static::selectRaw('year(created_at) year,monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
          //format the created_at field as a year
        //format the created_at field as a month name eg january    
        //count number of post for each month and year as published
        //group according to year and month
        // return $archives;
      }
}
