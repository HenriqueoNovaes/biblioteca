<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    // Definir a relação com Livros, e a coluna genre_id
    public function livros()
    {
        return $this->hasMany(Livros::class, 'genre_id');
    }
}
