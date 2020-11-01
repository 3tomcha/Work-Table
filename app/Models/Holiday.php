<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'day', 'description', 'user_id',
  ];

    //
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    
    
}
