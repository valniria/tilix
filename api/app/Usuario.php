<?php

namespace serve;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    
    public $timestamps = false;

    protected $fillable = array('nome');

    public function titulo() {

        return $this->hasMany('serve\Titulo','id_usuario', 'id');
   }


}
