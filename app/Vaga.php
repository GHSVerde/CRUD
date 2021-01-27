<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    

    /**
     * Indica o uso de SoftDeletes
     */
    use SoftDeletes;

    /**
     * Chave primária da tabela
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Variável que diz o nome da tabela no banco.
     *
     * @var string
     */
    protected $table = 'vagas';

    /**
     * Uso de TimeStamp
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Atributos que podem ser atribuídos
     *
     * @var array
     */
    protected $fillable = ['empresa', 'vaga', 'situacao', 'telefone', 'url_referencia', 'feedback', 'indicacao', 'email'];


}
