<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Массово присваеваемые атрибуты
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Принадлежность к классу User. Отножение один ко многим
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
