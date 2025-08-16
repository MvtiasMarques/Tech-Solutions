<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Proyectos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: #667eea;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .hero {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
            color: #667eea;
        }

        .auth-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .api-demo {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .api-demo h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }

        .api-endpoint {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            font-family: monospace;
            border-left: 4px solid #667eea;
        }

        .status {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status.get { background: #d4edda; color: #155724; }
        .status.post { background: #fff3cd; color: #856404; }

        .tech-stack {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .tech-stack h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }

        .tech-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .tech-item {
            background: #f8f9fa;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: bold;
            color: #667eea;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .nav { flex-direction: column; gap: 1rem; }
            .auth-buttons { flex-direction: column; }
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">Gestión de Proyectos</div>
            <div class="nav-links">
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                <a href="{{ route('register') }}">Registro</a>
                <a href="#api">API</a>
                <a href="#tecnologias">Tecnologías</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <section class="hero">
            <h1>Sistema de Gestión de Proyectos</h1>
            <p>Plataforma moderna para la gestión eficiente de proyectos empresariales</p>
        </section>

        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">🔐</div>
                <h3>Autenticación Segura</h3>
                <p>Sistema de autenticación con JWT y cifrado de contraseñas usando Hash de Laravel</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Gestión de Usuarios</h3>
                <p>Registro y manejo de usuarios con validación de datos y campos únicos</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Control de Proyectos</h3>
                <p>Administración completa de proyectos con fechas, estados, responsables y montos</p>
            </div>
        </section>

        <section class="auth-section">
            <h2>Acceso al Sistema</h2>
            <p>Inicia sesión o regístrate para acceder a todas las funcionalidades</p>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
            </div>
        </section>

        <section class="api-demo" id="api">
            <h3>📡 Endpoints de la API</h3>
            <p>El sistema incluye una API REST completa con los siguientes endpoints:</p>
            
            <div class="api-endpoint">
                <span class="status post">POST</span> /api/auth/register - Registro de usuarios
            </div>
            <div class="api-endpoint">
                <span class="status post">POST</span> /api/auth/login - Inicio de sesión (retorna JWT)
            </div>
            <div class="api-endpoint">
                <span class="status post">POST</span> /api/auth/logout - Cerrar sesión
            </div>
            <div class="api-endpoint">
                <span class="status get">GET</span> /api/auth/me - Información del usuario autenticado
            </div>
            <div class="api-endpoint">
                <span class="status get">GET</span> /api/proyectos - Lista de proyectos
            </div>

            <p><strong>Características implementadas:</strong></p>
            <ul style="text-align: left; margin-top: 1rem;">
                <li>✅ Cifrado de contraseñas con Hash::make()</li>
                <li>✅ Autenticación JWT</li>
                <li>✅ Middleware de validación de tokens</li>
                <li>✅ Validación de datos de entrada</li>
                <li>✅ Modelos con relaciones (Usuario ↔ Proyecto)</li>
                <li>✅ Configuración de base de datos según especificaciones</li>
            </ul>
        </section>

        <section class="tech-stack" id="tecnologias">
            <h3>🛠️ Stack Tecnológico</h3>
            <div class="tech-list">
                <span class="tech-item">PHP 8.2</span>
                <span class="tech-item">Laravel 11</span>
                <span class="tech-item">JWT Auth</span>
                <span class="tech-item">MySQL</span>
                <span class="tech-item">Eloquent ORM</span>
                <span class="tech-item">Blade Templates</span>
                <span class="tech-item">REST API</span>
            </div>
            
            <div style="margin-top: 2rem; text-align: left;">
                <h4>Configuración de Base de Datos:</h4>
                <ul>
                    <li><strong>Nombre:</strong> desarrollo_software_1</li>
                    <li><strong>Usuario:</strong> root</li>
                    <li><strong>Contraseña:</strong> desarrollo_software_1</li>
                </ul>
            </div>
        </section>
    </div>

    <script>
        // Verificar si hay token almacenado
        const token = localStorage.getItem('token');
        if (token) {
            console.log('Usuario autenticado con token:', token);
        }

        // Función para probar la API
        async function testAPI() {
            try {
                const response = await fetch('/api/proyectos');
                const data = await response.json();
                console.log('Proyectos:', data);
            } catch (error) {
                console.error('Error al obtener proyectos:', error);
            }
        }

        // Llamar función de prueba
        testAPI();
    </script>
</body>
</html>
