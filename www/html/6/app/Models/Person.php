<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static $validate_rules = array(
        'name' => 'required|max:5'
    );

    public function getData()
    {
        return $this->name;
    }

}
