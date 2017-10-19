<?php

namespace serve;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    public $timestamps = false;

    protected $fillable = array('data_vencimento', 'valor', 'id_usuario');
}
