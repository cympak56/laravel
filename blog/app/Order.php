<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'user_id'
    ];
	
    public function goods()
    {
        return $this->hasMany(Good::class);
    }
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
