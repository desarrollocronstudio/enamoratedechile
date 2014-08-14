<?php
/**
 * Author: Gonzalo De Spirito
 * Email: gonzalo@freshworkstudio.com
 * Date: 14-08-14 17:32
 */

class TipCategoryController extends BaseController{

    function __construct(){

    }

    public function pictures($id){
        $cat = TipType::findOrFail($id);
        return Response::json([
            'images' => $cat->pictures()
        ]);

    }
} 