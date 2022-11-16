<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\UseUse;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'os', 'mnemonico_shift', 'mnemonico_apoio', 'prioridade_id', 'imagens', 'usuario_id'];
    protected $hidden = ['created_at', 'updated_at','deleted_at'];
    use SoftDeletes;

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
