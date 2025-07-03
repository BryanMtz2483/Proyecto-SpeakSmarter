<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     * los “props” (properties) son simplemente datos que se comparten desde el backend (Laravel) hacia el frontend (Vue, React, etc.) en cada página renderizada por Inertia.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
{
    return array_merge(parent::share($request), [
        'user.roles' => $request->user() ? $request->user()->roles->pluck('name') : [],
        'user.permissions' => $request->user() ? $request->user()->getPermissionsViaRoles()->pluck('name') : [],
    ]); //array_merge() toma el array que retorna parent::share($request) y le añade tus props personalizados. Hazlo de esta manera siempre
    }
    /*  El método SHARE se encuentra en tu App\Http\Middleware\HandleInertiaRequests y se encarga de:
        1. Compartir props globales que estarán disponibles en TODAS las páginas de tu app frontend.
        2. Se ejecuta en cada petición que devuelve una vista Inertia.*/
}
