<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\Request;

trait APIRestfulHandler
{
    use APIResponseHandlerTrait;

    public function index(Request $request)
    {
    }

    public function preview($id)
    {
        $entry = null;
        try {
            $entry = $this->getResource()->findOrFail($id);
        } catch (\Exception $ex) {
            return $this->errorResponse("Không tìm thấy dữ liệu phù hợp. Vui lòng thử lại sau.", 404);
        }
        return $this->responseOne($entry, 200);
    }

    public function show($id)
    {
        $entry = null;
        try {
            $entry = $this->getResource()->findOrFail($id);
        } catch (\Exception $ex) {
            return $this->errorResponse("Không tìm thấy dữ liệu phù hợp. Vui lòng thử lại sau.", 404);
        }
        return $this->responseOne($entry, 200);
    }

    public function store(Request $request)
    {
        //@TODO
    }

    public function update(Request $request, $id)
    {
        //@TODO
    }

    public function destroy($id)
    {
        //@TODO
    }
}
