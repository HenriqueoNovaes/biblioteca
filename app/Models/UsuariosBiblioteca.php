<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosBiblioteca extends Model
{
    use HasFactory;

    protected $table = 'users_biblioteca';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'registration_number',
    ];

    //emprestimos
    public function emprestimos()
    {
        return $this->hasMany(Emprestimos::class);
    }
}
