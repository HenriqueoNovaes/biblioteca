<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'start_date',
        'return_date',
        'status',
    ];

    /**
     * Get the user that owns the loan.
     */
    public function usersbiblioteca()
    {
        return $this->belongsTo(UsuariosBiblioteca::class, 'user_id');
    }

    /**
     * Get the book that is loaned.
     */
    public function livros()
    {
        return $this->belongsTo(Livros::class, 'book_id');
    }
}
