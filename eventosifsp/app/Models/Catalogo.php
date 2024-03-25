<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    protected $table = 'catalogo'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Chave primária da tabela
}
