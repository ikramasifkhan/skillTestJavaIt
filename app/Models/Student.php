<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'studentId',
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'sms_no',
        'present_address',
        'session',
        'year',
        'klass_id',
        'group_id',
        'section_id',
        'roll',
    ];

    protected $guarded =['id'];
    protected $table ='students';

    public function klass(){
        return $this->belongsTo(Klass::class, 'klass_id', 'id');
    }
    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function section(){
        return $this->belongsTo(ClassSection::class, 'section_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $lastId = Student::latest()->first();
            if(isset($lastId)){
                $model->studentId = date('Ym').str_pad($lastId->id+1,3, '0',STR_PAD_LEFT);
            }else{
                $model->studentId = date('Ym').str_pad('1','3', '0',STR_PAD_LEFT);
            }

        });
    }
}

