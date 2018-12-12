<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/11/18
 * Time: 12:46 PM
 */

namespace App\Services;


use App\Services\Interfaces\ICrud;
use App\Specification;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class SpecificationService implements ICrud
{
    /**
     * @return JsonResponse
     */
    public function getCollection()
    {
        $spec = Specification::all();

        return response()->json(
            [
                'specifications' => $spec
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function saveNewObj($data)
    {
        $spec = new Specification();
        $spec->variation_id = (int)$data->variation_id;
        $spec->attribute = (string)$data->attribute;
        $spec->value = (string)$data->value;
        $spec->save();

        return response()->json(
            [
                'message' => "Specification Created!"
            ], Response::HTTP_CREATED);

    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getObjById(int $id)
    {
        $spec = Specification::findOrFail($id);

        return response()->json(
            [
                "specification_({$id})" => $spec
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function updateObj($data)
    {
        $spec = Specification::findOrFail($data->id);
        $spec->update($data->all());

        return response()->json(
            [
                'message' => 'Specification Updated'
            ], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deleteObj(int $id)
    {
        $spec = Specification::findOrFail($id);
        $spec->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}