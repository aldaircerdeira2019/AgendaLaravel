<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContatoModel extends Model
{
    protected $table    = 'contatos';
    protected $fillable = ['nome','telefone','email', 'data_n', 'descrição','avatar'];



}
