<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','profile_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function created_by()
    {
        return $this->hasOne(User::class,'id','created_by_user_id');
    }
    public function updated_by()
    {
        return $this->hasOne(User::class,'id','updated_by_user_id');
    }
}
