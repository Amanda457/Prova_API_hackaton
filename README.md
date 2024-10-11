# Gestor d'usuaris i activitats

## Descripció

Aquest projecte és una API, la qual ens permet registrar usuaris i gestionar les seves dades, com actualitzar informació, mostrar-la o eliminar l'usuari, registrar activitats, mostrar-les, i apuntar a usuaris a les activitats. Tot això treballant amb format JSON i base de dades.


## Instal·lació

Per instal·lar l'aplicació en local, seguiu els següents passos:

1. **Clonar el repositori:**
   ```bash
   git clone https://github.com/Amanda457/Prova_API_hackaton.git 
2. **Personalitzar el .env**
   
   A partir del .env-example, feu una còpia, anomena'l .env i introduiu les credencials de base de dades de preferència 
   (preferiblement Mysql, MariaDB o SqLite)
4. **Instal·lar les dependències:**
   ```bash
   composer install

5. **Migrar i poblar la base de dades:**
   ```bash
   php artisan migrate --seed
6. **Posar el servidor en marxa:**
   ```bash
   php artisan serve

## Endpoints
Aquest són els endpoints que podreu testejar de l'API:
### Gestió d'Usuaris

- **`POST /users`**: Crea un nou usuari amb les dades proporcionades.
- **`GET /users/{id}`**: Recupera la informació d'un usuari específic per ID.
- **`PUT /users/{id}`**: Actualitza les dades d'un usuari existent per ID.
- **`DELETE /users/{id}`**: Elimina un usuari identificat pel seu ID.

### Gestió d'Activitats

- **`POST /activities`**: Crea una nova activitat amb les dades proporcionades.
- **`GET /activities`**: Recupera la llista de totes les activitats disponibles.
- **`POST /activities/book`**: Apunta un usuari a una activitat específica.

### Importar/Exportar arxiu JSON
- **`POST /activities/import`**: Importa activitats des d'un arxiu JSON.
- **`GET /activities/export`**: Exporta la llista d'activitats en format JSON.

Qualsevol suggerència i/o dubte, podeu obrir un issue. Moltes gràcies.
