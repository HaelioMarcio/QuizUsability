<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class QuestionarioValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'descricao' => 'required|min:10',
            'objetivo' => 'required|min:10'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'descricao' => 'required|min:10',
            'objetivo' => 'required|min:10'
        ],
   ];

}