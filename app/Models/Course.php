<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'image',
        'teacher_id',
        'category_id',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function students(){
        return $this->belongsToMany(User::class);


    }
    public function reviews(){
        return $this->hasMany(Review::class)->with(['user:id,name'])->orderBy('created_at','desc');
    }

}
