<?php

namespace App\Http; // ✅ Ensure this namespace is correct

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'api' => [
            \App\Http\Middleware\ForceJsonResponse::class,
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Ensure stateful requests
            'throttle:api', // Limit request rate
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Bind route model parameters
            
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ],

        
    ];
    
}
