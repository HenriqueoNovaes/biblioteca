<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'registration_number_book',
        'genre_id',
        'status',
    ];

    /**
     * The genres that belong to the book.
     */
    public function genero()
    {
        return $this->belongsTo(Generos::class, 'genre_id');
    }

    /**
     * Get the loans for the book.
     */
    public function emprestimos()
    {
        return $this->hasMany(Emprestimos::class);
    }
}
