# Sistema de Gestión de Proyectos

Sistema web desarrollado con Laravel 11 para la gestión de proyectos empresariales.

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL

## Instalación

1. Clonar el repositorio
2. Instalar dependencias:
   ```bash
   composer install
   ```
3. Configurar archivo `.env` con los datos de la base de datos
4. Ejecutar migraciones:
   ```bash
   php artisan migrate
   ```
5. Iniciar el servidor:
   ```bash
   php artisan serve
   ```

## Configuración de Base de Datos

```env
DB_DATABASE=desarrollo_software_1
DB_USERNAME=root
DB_PASSWORD=desarrollo_software_1
```

## Rutas de la API

- `POST /api/auth/register` - Registro de usuario
- `POST /api/auth/login` - Inicio de sesión
- `POST /api/auth/logout` - Cerrar sesión
- `GET /api/auth/me` - Información del usuario
- `GET /api/proyectos` - Lista de proyectos

## Estructura de Datos

### Usuario
- id
- nombre
- correo
- clave

### Proyecto
- id
- nombre
- fecha_inicio
- estado
- responsable
- monto
- created_by

## Uso

1. Visitar `http://127.0.0.1:8000`
2. Registrar un nuevo usuario
3. Iniciar sesión para obtener token JWT
4. Usar el token para acceder a rutas protegidas
