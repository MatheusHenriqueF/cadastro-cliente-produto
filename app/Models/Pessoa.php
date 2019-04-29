<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
    	'nome', 'cpf', 'data_nascimento'];

    public $rules = [
    	'nome' => 'required|min:3|max:32|unique:pessoas',
    	'cpf' => 'required|unique:pessoas',
    	'data_nascimento' => 'required',
    ];
}
