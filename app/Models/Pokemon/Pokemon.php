<?php

namespace App\Models\Pokemon;

use App\Models\Party\Party;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int                                         $id
 * @property string                                      $name
 * @property string                                      $abilities
 * @property string                                      $image
 * @property string|null                                 $icon
 *

 **/

class Pokemon extends Model
{
    use HasFactory;


    protected $casts = [
        'abilities' => 'json',
        'sprites' => 'json',
    ];

    public function users()
    {
        //todo WITH PIVOT WITH PIVOT WITH PIVOT WITH PIVOT WITH PIVOT WITH PIVOT WITH PIVOT
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['id'])
            ->withPivot(['is_owned'])
            ->withPivot(['is_shiny'])
            ->withPivot(['nickname'])
            ->withPivot(['description'])
            ->withPivot(['level']);

    }

    public function parties()
    {
        return $this->belongsToMany(Party::class);
    }

}
