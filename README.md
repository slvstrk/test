## Инструкция по запуску
- docker compose up -d
- docker compose exec php /bin/bash
- composer i
- php artisan migrate --seed
- php artisan test --env=testing (два простых теста на доступность всех роутов)

## API
- токен: abc123def456ghi789xyz
- swagger ui: http://localhost:8000/api/documentation
