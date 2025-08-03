<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiRoutesAvailabilityTest extends TestCase
{
    protected string $validToken = 'abc123def456ghi789xyz';
    protected string $invalidToken = 'invalid-token';

    protected array $routes = [
        [
            'uri' => '/api/v1/organizations/search',
            'params' => [
                's' => 'group'
            ]
        ],
        [
            'uri' => '/api/v1/organizations/nearby',
            'params' => [
                'lat' => 52.05697700,
                'lon' => 23.68381600,
                'radius' => 3
            ]
        ],
        ['uri' => '/api/v1/organizations/1'],
        ['uri' => '/api/v1/organizations'],
        ['uri' => '/api/v1/buildings/1/organizations'],
        ['uri' => '/api/v1/buildings/1'],
        ['uri' => '/api/v1/buildings'],
        ['uri' => '/api/v1/activities/1/organizations'],
        ['uri' => '/api/v1/activities/1'],
        ['uri' => '/api/v1/activities/']
    ];

    public function test_routes_return_200_with_valid_token()
    {
        foreach ($this->routes as $route) {
            $uri = $route['uri'];
            $params = $route['params'] ?? [];

            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $this->validToken,
            ])->get($uri . (!empty($params) ? '?' . http_build_query($params) : ''));

            $response->assertStatus(200);
        }
    }

    public function test_routes_return_401_with_invalid_or_missing_token()
    {
        foreach ($this->routes as $route) {
            // без токена
            $response = $this->get($route['uri']);
            $response->assertStatus(401);

            // с неверным токенов
            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $this->invalidToken,
            ])->get($route['uri']);
            $response->assertStatus(401);
        }
    }
}
