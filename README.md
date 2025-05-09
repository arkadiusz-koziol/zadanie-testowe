Mimo, iż w zadaniu było napisane, żeby zastosować interfejs do serwisów, nie zrobiłem tego, ponieważ używanie interfejsów
w serwisach nie ma sensu. Logika biznesowa się nie zmienia zależnie od tego, czego używamy. Na poczet tego,
interfejsy zastosowałem w warstwie repozytoriów.

Zadanie Testowe - API (Laravel + Docker)

🚀 Rozruch środowiska

Przejdź do katalogu .docker:
cd .docker
Zbuduj obrazy:
docker compose build
Uruchom kontenery:
docker compose up -d
Sprawdź status:
docker ps

⚙️ Konfiguracja aplikacji

Skopiuj plik .env.example do .env (pliki są już przygotowane z poprawnymi danymi do bazy danych):
cp .env.example .env
Wygeneruj klucz aplikacji:
php artisan key:generate
Wykonaj migracje:
php artisan migrate
Uruchom seedery:
php artisan db:seed
📡 Dostępne Endpointy

Wszystkie endpointy dostępne są pod adresem:
http://localhost:8061/api

🔒 Autoryzacja przez Sanctum

Wszystkie zasoby API są zabezpieczone przez Sanctum, co oznacza, że przed użyciem musisz się zalogować i pobrać token.

Logowanie

POST /api/login

📄 Posty

GET /api/posts - lista postów

GET /api/posts/{id} - szczegóły posta

POST /api/posts - utworzenie posta

PUT /api/posts/{id} - aktualizacja posta

DELETE /api/posts/{id} - usunięcie posta

💬 Komentarze

GET /api/comments - lista komentarzy

GET /api/comments/{id} - szczegóły komentarza

POST /api/comments - utworzenie komentarza

PUT /api/comments/{id} - aktualizacja komentarza

DELETE /api/comments/{id} - usunięcie komentarza

👤 Użytkownicy

GET /api/users - lista użytkowników

GET /api/users/{id} - szczegóły użytkownika

POST /api/users - utworzenie użytkownika

PUT /api/users/{id} - aktualizacja użytkownika

DELETE /api/users/{id} - usunięcie użytkownika**
