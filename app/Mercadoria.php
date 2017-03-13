<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/03/2017
 * Time: 20:39
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercadoria extends Model
{
        public $table = 'mercadoria';
        protected $primaryKey = 'cd_mercadoria';

        protected $fillable = [
            'tp_mercadoria',
            'nm_mercadoria',
            'quantidade',
            'preco',
            'cd_negocio'
        ];
}