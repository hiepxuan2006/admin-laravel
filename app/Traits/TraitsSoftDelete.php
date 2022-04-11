<?php

namespace App\Traits;

trait TraitsSoftDelete
{
    public function TraitsSoftDelete($id, $model)
    {
        try {
            //code...
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'status' => 'success'
            ], status: 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'code' => 500,
                'status' => 'fail'
            ], status: 500);
        }
    }
}
