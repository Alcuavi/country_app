# Proyecto de Gestión de Países

Este proyecto es una aplicación web sencilla que permite almacenar y actualizar información relativa a países utilizando Symfony y una base de datos MySQL. La aplicación obtiene información de la API pública de RestCountries.

## Requisitos

- Docker
- Docker Compose

## Tecnologías Utilizadas

- Symfony 6.0.2
- PHP 8.0
- MySQL 5.7
- HTML, JavaScript, CSS
- JQuery
- Bootstrap

## Instalación y Puesta en Marcha

### Paso 1: Clonar el Repositorio

Clona este repositorio en tu máquina local:

```sh
git clone https://github.com/Alcuavi/country_app.git
cd country_app
```

### Paso 2: Construir y Levantar los Contenedores Docker
Construye y levanta los contenedores Docker:

```sh
docker-compose up --build -d
```

### Paso 3: Instalar Dependencias de Composer
Accede al contenedor de la aplicación y ejecuta composer install:

```sh
docker-compose exec php bash
composer install
```

### Paso 4: Configurar la Base de Datos
Ejecuta las migraciones para configurar la base de datos:

```sh
php bin/console doctrine:migrations:migrate
```

### Paso 5: Cargar Datos Iniciales (Opcional, ya que pueden cargarse desde la propia APP)
Para cargar la información inicial de los países, puedes ejecutar el comando desde el contenedor de la aplicación:

```sh
php bin/console app:load-countries
```

### Paso 6: Acceder a la Aplicación
La aplicación debería estar disponible en http://localhost:8000/country.

## Funcionalidades
CRUD de Países: Crear, leer, actualizar y eliminar países.
Cargar Países desde la API: Cargar y actualizar la información de los países desde la API de RestCountries.
Eliminar Múltiples Países: Eliminar múltiples países seleccionados desde la interfaz.(En desarrollo)


