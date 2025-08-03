<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Get(
 *      path="/api/v1/activities",
 *      summary="Список возможной деятельности",
 *      tags={"Activity"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(ref="#/components/schemas/Activity")
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Неавторизован"
 *      )
 *  )
 *
 *
 * @OA\Get(
 *      path="/api/v1/activities/{id}",
 *      summary="Информация о виде деятельности",
 *      tags={"Activity"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID",
 *          required=true,
 *          @OA\Schema(type="integer", default=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", ref="#/components/schemas/ActivitySimple")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Неавторизован"
 *      )
 *  )
 *
 *
 * @OA\Get(
 *      path="/api/v1/activities/{id}/organizations",
 *      summary="Список организаций, связанных с видом деятельности",
 *      tags={"Activity"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="page",
 *          in="query",
 *          description="Номер страницы",
 *          required=false,
 *          @OA\Schema(type="integer", default=1)
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID вида деятельности",
 *          required=true,
 *          @OA\Schema(type="integer", default=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Organization")),
 *              @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *              @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Неавторизован"
 *      )
 *  )
 */
class ActivityController extends Controller
{
}
