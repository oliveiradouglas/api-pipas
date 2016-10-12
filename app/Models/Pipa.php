<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pipa extends Model {
	use SoftDeletes;

    protected $fillable = ['cor', 'tamanho', 'preco', 'foto'];
}
