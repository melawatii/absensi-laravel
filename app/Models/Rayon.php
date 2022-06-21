<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;
    protected $table = 'rayons';
    protected $fillable = ['rayon', 'pemb_rayon'];

    // Untuk relasi ke tabel user
    /**
     * Get all of the users for the Rayon
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
