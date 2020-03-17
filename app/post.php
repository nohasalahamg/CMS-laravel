<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\category;
use App\User;
use App\tag;
class post extends Model
{
    //


use softDeletes;

   

protected $fillable=['title','description','content','image','category_id','user_id'];


public function category(){



    return $this->belongsTo(category ::class);
}



public function tags(){



    return $this->belongsToMany(tag ::class);
}

public function user(){



    return $this->BelongsTo(User ::class);
}

public function Hascategory($catid){


    return in_array( $catid,
    $this->category->pluck('id')->ToArray());
}




public function HasTag($tagid){


    return in_array( $tagid,
    $this->tags->pluck('id')->ToArray());
}


}
