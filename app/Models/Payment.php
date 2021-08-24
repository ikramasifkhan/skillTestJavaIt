<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * table
     *
     * @var string
     */
    protected $table = 'payments';
}
