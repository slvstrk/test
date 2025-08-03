<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Api",
 *     version="1.0.0"
 * )
 * @OA\PathItem(
 *     path="/api/v1"
 * )
 * @OA\Components(
 *      @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          type="http",
 *          scheme="bearer",
 *          bearerFormat="JWT"
 *      )
 *  )
 */
class MainController extends Controller
{
}
