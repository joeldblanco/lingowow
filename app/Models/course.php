<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'course_id';

    /**
     * Get the products associated with the course.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'course_product','course_id','product_id');
    }

    /**
     * Get the modukes associated with the course.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class,'course_product','course_id','product_id');
    }
}
