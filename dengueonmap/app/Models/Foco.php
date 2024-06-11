<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    use HasFactory;

    protected $table = 'focos'; // Especificar o nome da tabela se for diferente do nome do modelo

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'caminho_foto', 'latitude', 'longitude', 'cep', 'cidade', 'estado', 'endereco', 'numero', 'descricao', 'focos_identificados', 'data_foco', 'nome_foco','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'foco_user');
    }
}
