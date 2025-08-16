<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    private static $usuarios = [
        [
            'id' => 1,
            'nombre' => 'Juan Pérez',
            'correo' => 'juan@example.com',
            'clave' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ],
        [
            'id' => 2,
            'nombre' => 'María García',
            'correo' => 'maria@example.com',
            'clave' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]
    ];

    private static $proyectos = [
        [
            'id' => 1,
            'nombre' => 'Sistema de Inventario',
            'fecha_inicio' => '2025-01-15',
            'estado' => 'En Progreso',
            'responsable' => 'Juan Pérez',
            'monto' => 15000.00,
            'created_by' => 1,
        ],
        [
            'id' => 2,
            'nombre' => 'App Móvil de Ventas',
            'fecha_inicio' => '2025-02-01',
            'estado' => 'Planificado',
            'responsable' => 'María García',
            'monto' => 25000.00,
            'created_by' => 2,
        ]
    ];

    public function __construct()
    {
        
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'clave' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos de validación incorrectos',
                'messages' => $validator->errors()
            ], 400);
        }

        // Verificar si el correo ya existe
        foreach (self::$usuarios as $usuario) {
            if ($usuario['correo'] === $request->correo) {
                return response()->json([
                    'error' => 'El correo ya está registrado'
                ], 400);
            }
        }

        $nuevoUsuario = [
            'id' => count(self::$usuarios) + 1,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'clave' => Hash::make($request->clave),
        ];

        self::$usuarios[] = $nuevoUsuario;

        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'usuario' => [
                'id' => $nuevoUsuario['id'],
                'nombre' => $nuevoUsuario['nombre'],
                'correo' => $nuevoUsuario['correo']
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'clave' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos de validación incorrectos',
                'messages' => $validator->errors()
            ], 400);
        }

        $usuarioEncontrado = null;
        foreach (self::$usuarios as $usuario) {
            if ($usuario['correo'] === $request->correo) {
                $usuarioEncontrado = $usuario;
                break;
            }
        }

        if (!$usuarioEncontrado) {
            return response()->json([
                'error' => 'Credenciales incorrectas'
            ], 401);
        }

        if (!Hash::check($request->clave, $usuarioEncontrado['clave'])) {
            return response()->json([
                'error' => 'Credenciales incorrectas'
            ], 401);
        }

        $payload = [
            'sub' => $usuarioEncontrado['id'],
            'nombre' => $usuarioEncontrado['nombre'],
            'correo' => $usuarioEncontrado['correo'],
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24)
        ];

        try {
            $token = JWTAuth::fromUser((object) $usuarioEncontrado);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'No se pudo crear el token'
            ], 500);
        }

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'usuario' => [
                'id' => $usuarioEncontrado['id'],
                'nombre' => $usuarioEncontrado['nombre'],
                'correo' => $usuarioEncontrado['correo']
            ]
        ]);
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Sesión cerrada exitosamente'
        ]);
    }

    public function me()
    {
        return response()->json([
            'id' => 1,
            'nombre' => 'Usuario Ejemplo',
            'correo' => 'usuario@example.com'
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'token' => 'nuevo_token_ejemplo'
        ]);
    }

    public function getProyectos()
    {
        return response()->json([
            'proyectos' => self::$proyectos
        ]);
    }
}
