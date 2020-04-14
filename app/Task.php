<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    const STATUS =[
        1 => [ 'labrl' => '未着手', 'class' => 'label-dander'],
        2 => [ 'labrl' => '着手中', 'class' => 'label-info'],
        3 => [ 'labrl' => '完了', 'class' => ''],
    ];
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getFormatteDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
