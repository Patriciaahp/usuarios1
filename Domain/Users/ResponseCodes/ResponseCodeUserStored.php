<?php

namespace Domain\Users\ResponseCodes;

use Domain\Users\Actions\ActionResponseCode;

class ResponseCodeUserStored extends ActionResponseCode
{
function __construct($object){
    parent::__construct(
        201,
        ActionResponseCode::STATUS_SUCCESS,
        'User created',
        $object
    );
}
}
