<?php

namespace App\Models;

use App\Http\Controllers\StatusController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;



class Post extends Model
{
    use HasFactory, Sluggable;
    
    public $table = "posts";

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('judul', 'like', '%' . request('search') . '%');
        }
        if(request('cari')){
            return $query->where('judul', 'like', '%' . request('cari') . '%');
        }
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
