<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class GitUser extends Model
{
    use HasFactory;

    public function fetchAll() 
    {
        $result = cache('git_user_query_cache', function() {
            return $this->all();
        });
        
        return $result;
    }
}
