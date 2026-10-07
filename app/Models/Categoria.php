<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // asociado a la tabla categorías 
    //protected $table="categorias" por defecto ya esta conectado;

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
