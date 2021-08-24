<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesSetup extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'klass_id', 'group_id', 'section_id', 'payment_id', 'fees_id', 'amount', 'acedamic_year'
    ];

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
    protected $table = 'fees_setups';

    /**
     * klass
     *
     * @return void
     */
    public function klass()
    {
        return $this->belongsTo(Klass::class, 'klass_id', 'id');
    }

    /**
     * group
     *
     * @return void
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    /**
     * section
     *
     * @return void
     */
    public function section()
    {
        return $this->belongsTo(ClassSection::class, 'section_id', 'id');
    }

    /**
     * payment
     *
     * @return void
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    /**
     * fees
     *
     * @return void
     */
    public function fees()
    {
        return $this->belongsTo(Fees::class, 'fees_id', 'id');
    }
}
