<?php

namespace Domain\Users\FormatData;

use Illuminate\Http\Request;

class FormatDataForStoreUserAction
{

    public static function fromRequestToPanel(Request $request){
        return array (
            'name'=> $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'active' =>$request->active ? $request->active : 0,
        ) ;
    }
}
