<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';

    // protected $table = 'songs';

    // protected $keyType = 'int';

    // public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
    protected $fillable = ['title', 'singer'];
}
