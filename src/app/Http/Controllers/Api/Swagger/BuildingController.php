<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Get(
 *      path="/api/v1/buildings",
 *      summary="Список зданий",
 *      tags={"Buildings"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="page",
 *          in="query",
 *          description="Номер страницы",
 *          required=false,
 *          @OA\Schema(type="integer", default=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Building")),
 *              @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *              @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
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
 *      path="/api/v1/buildings/{id}",
 *      summary="Информация о здании",
 *      tags={"Buildings"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID здания",
 *          required=true,
 *          @OA\Schema(type="integer", default=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                   property="data",
 *                   ref="#/components/schemas/Building"
 *               )
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
 *     path="/api/v1/buildings/{id}/organizations",
 *     summary="Список организаций в здании",
 *     tags={"Buildings"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID здания",
 *         required=true,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Organization")),
 *             @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *             @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Неавторизован"
 *     )
 * )
 */
class BuildingController extends Controller
{
}
