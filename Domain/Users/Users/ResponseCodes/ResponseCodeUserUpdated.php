<?php

namespace Domain\Users\Users\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserUpdated extends ActionResponseCode
{
    function __construct($object){
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'User updated',
            $object
        );
    }
}
