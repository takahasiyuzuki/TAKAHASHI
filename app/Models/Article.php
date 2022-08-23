<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
        'img_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userid()
    {
      return $this->belongsTo('App\Models\User','name');
    }
  
}
