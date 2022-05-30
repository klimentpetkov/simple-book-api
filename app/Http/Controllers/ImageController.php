<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * Retreive an existing image or return a not found response
     *
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function __invoke($name)
    {
        if (!file_exists(storage_path($name))) {
            return response()->json(
                ['message' => trans('messages.imageController.noSuchFile', ['name' => $name])],
                Response::HTTP_NOT_FOUND
            );
        }

        return  Storage::response($name);
    }
}
