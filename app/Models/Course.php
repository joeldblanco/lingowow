<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'modality',
        'category',
    ];

    /**
     * Get the products associated with the course.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'course_product', 'course_id', 'product_id');
    }

    /**
     * Get the modules associated with the course.
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    /**
     * Get the units associated with the course.
     */
    public function units()
    {
        return $this->modules->pluck('units')->flatten();
    }
}
//
