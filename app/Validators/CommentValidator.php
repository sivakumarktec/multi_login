<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;

class CommentValidator extends LaravelValidator {

    protected $rules = [
        'comments' 	      => 'required',
        'created_by'  	  => 'required',
        'is_admin_created'=> 'required'
    ];

}