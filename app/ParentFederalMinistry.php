<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentFederalMinistry extends Model
{
    protected $fillable=[
        'parent_fed_ministry_name',
        'parent_fed_ministry_addr',
        'parent_fed_ministry_info',
    ];

  public function customerNote(){
      return $this->hasMany('App\CustomerNote','parent_fed_min_id','parent_fed_ministry_name');
  }
}
