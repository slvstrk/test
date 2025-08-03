<?php

namespace App\Http\Controllers\Api\Swagger;

/**
 *
 * @OA\Schema(
 *      schema="Activity",
 *      type="object",
 *      @OA\Property(property="id", type="integer", example=3),
 *      @OA\Property(property="name", type="string", example="Молочная продукция"),
 *      @OA\Property(property="parent_id", type="integer", example=1)
 *  )
 *
 * @OA\Schema(
 *     schema="ActivitySimple",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Еда")
 * )
 *
 * @OA\Schema(
 *     schema="ActivityTree",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Еда"),
 *     @OA\Property(property="children", type="array", @OA\Items(ref="#/components/schemas/Activity"))
 * )
 *
 * @OA\Schema(
 *     schema="Address",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=364),
 *     @OA\Property(property="country", type="string", example="Беларусь"),
 *     @OA\Property(property="city", type="string", example="Гомель"),
 *     @OA\Property(property="house", type="string", example="92"),
 *     @OA\Property(property="lat", type="float", example=59.98452),
 *     @OA\Property(property="lon", type="float", example=30.691369)
 * )
 *
 * @OA\Schema(
 *     schema="Building",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="square", type="number", example=17000),
 *     @OA\Property(property="address", ref="#/components/schemas/Address")
 * )
 *
 * @OA\Schema(
 *     schema="Organization",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=216),
 *     @OA\Property(property="name", type="string", example="Roberts PLC"),
 *     @OA\Property(property="inn", type="string", example="7700142906"),
 *     @OA\Property(property="unit", type="string", example="мастерская 61"),
 *     @OA\Property(property="activities_tree", type="array", @OA\Items(ref="#/components/schemas/ActivityTree"))
 * )
 *
 * @OA\Schema(
 *    schema="Phone",
 *    type="object",
 *    @OA\Property(property="id", type="integer", example=553),
 *    @OA\Property(property="number", type="integer", example=79676310431),
 *    @OA\Property(property="ext", type="integer", example=234, nullable=true)
 * )
 *
 * @OA\Schema(
 *    schema="OrganizationFull",
 *    type="object",
 *    @OA\Property(property="id", type="integer", example=1),
 *    @OA\Property(property="name", type="string", example="Rempel Inc"),
 *    @OA\Property(property="inn", type="string", example="7792630934"),
 *    @OA\Property(property="unit", type="string", nullable=true, example=null),
 *    @OA\Property(property="activities_tree", type="array", @OA\Items(ref="#/components/schemas/ActivityTree")),
 *    @OA\Property(property="building", ref="#/components/schemas/Building"),
 *    @OA\Property(property="phones", type="array", @OA\Items(ref="#/components/schemas/Phone"))
 * )
 *
 * @OA\Schema(
 *     schema="PaginationMeta",
 *     type="object",
 *     @OA\Property(property="current_page", type="integer", example=1),
 *     @OA\Property(property="from", type="integer", example=1),
 *     @OA\Property(property="last_page", type="integer", example=100),
 *     @OA\Property(property="path", type="string", example="http://localhost:8000/api/v1/resource"),
 *     @OA\Property(property="per_page", type="integer", example=5),
 *     @OA\Property(property="to", type="integer", example=5),
 *     @OA\Property(property="total", type="integer", example=500),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(property="url", type="string", nullable=true, example="http://localhost:8000/api/v1/resource?page=2"),
 *             @OA\Property(property="label", type="string", example="2"),
 *             @OA\Property(property="active", type="boolean", example=true)
 *         )
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="PaginationLinks",
 *     type="object",
 *     @OA\Property(property="first", type="string", example="http://localhost:8000/api/v1/resource?page=1"),
 *     @OA\Property(property="last", type="string", example="http://localhost:8000/api/v1/resource?page=100"),
 *     @OA\Property(property="prev", type="string", nullable=true, example=null),
 *     @OA\Property(property="next", type="string", nullable=true, example="http://localhost:8000/api/v1/resource?page=3")
 * )
 *
 */
class Schemas
{
}
