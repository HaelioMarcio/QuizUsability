<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjetoValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'titulo' => 'required|min:5',
            'url' => 'required',
            'descricao' => 'required|min:5'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'titulo' => 'required|min:5',
            'url' => 'required',
            'descricao' => 'required|min:5'
        ],
   ];

}