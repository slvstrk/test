<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Get(
 *     path="/api/v1/organizations",
 *     summary="Список организаций",
 *     tags={"Organization"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Номер страницы",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Organization")),
 *             @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *             @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Неавторизован"
 *     )
 *   )
 *
 *
 * @OA\Get(
 *     path="/api/v1/organizations/{id}",
 *     summary="Подробная информация об организации",
 *     tags={"Organization"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID",
 *         required=true,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", ref="#/components/schemas/OrganizationFull")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Неавторизован"
 *     )
 * )
 *
 *
 * @OA\Get(
 *      path="/api/v1/organizations/search",
 *      summary="Поиск по наименованию",
 *      tags={"Organization"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="s",
 *          in="query",
 *          description="Наименование",
 *          required=true,
 *          @OA\Schema(type="string", default="Group")
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
 *
 *
 * @OA\Get(
 *      path="/api/v1/organizations/nearby",
 *      summary="Поиск по точке на карте",
 *      tags={"Organization"},
 *      security={{"bearerAuth": {}}},
 *      @OA\Parameter(
 *          name="lat",
 *          in="query",
 *          description="Широта",
 *          required=true,
 *          @OA\Schema(type="number", format="float", default=55.663639)
 *      ),
 *      @OA\Parameter(
 *          name="lon",
 *          in="query",
 *          description="Долгота",
 *          required=true,
 *          @OA\Schema(type="number", format="float", default=37.82639400)
 *      ),
 *      @OA\Parameter(
 *          name="radius",
 *          in="query",
 *          description="Радиус в км",
 *          required=true,
 *          @OA\Schema(type="number", default=3)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/OrganizationFull")),
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
class OrganizationController extends Controller
{
}
