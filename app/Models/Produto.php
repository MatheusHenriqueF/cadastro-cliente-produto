<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
    	'nome', 'preco', 'codigo'];

    public $rules = [
    	'nome' => 'required|min:3|max:32|unique:produtos',
    	'preco' => 'required',
    	'codigo' => 'required|unique:produtos',
    ];
    	
}
