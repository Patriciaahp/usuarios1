<?php

namespace App\Panel\Users\Controllers;

use Domain\Users\FormatData\FormatDataForStoreUserAction;

class StoreRequest
{

    public function store(StoreRequest $request){
        $data = FormatDataForStoreUserAction::fromRequestToPanel($request);
        $action = new StoreUserAction($data);
        $result = $action->execute();
    }


}
