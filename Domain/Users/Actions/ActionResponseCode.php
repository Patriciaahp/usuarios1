<?php

namespace Domain\Users\Actions;

class ActionResponseCode
{

    public const STATUS_SUCCESS = 'success';
    public const STATUS_WARNING = 'warning';
    public const STATUS_INFO = 'info';
    public const STATUS_ERROR = 'error';

    public $http_status;
    public $status;
    public $message;
    public $object;

    function __construct($http_status, $status, $message, $object = null){

        $this->http_status = $http_status;
        $this->status = $status;
        $this->message = $message;
        $this->object = $object;
    }

    public function ok(){
        return self::STATUS_SUCCESS == $this->status;
    }

}
