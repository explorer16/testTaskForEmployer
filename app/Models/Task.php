<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'completed'];

    protected $search = ['title', 'description', 'completed'];

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function scopeFilter($query)
    {
        if ($filter = request('id')) {
            $query->where('id', 'like', $filter . '%');
        }
        if ($filter = request('title')) {
            $query->where('title', 'like', '%' . $filter . '%');
        }
        if ($filter = request('completed')) {
            $query->where('completed', $filter);
        }

        return $query;
    }

    public function scopeSort($query) {
        return $query->orderBy(request('sortBy', 'id'), request('direction', 'asc'));
    }
}
