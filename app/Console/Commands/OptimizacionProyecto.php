<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizacionProyecto extends Command
{
    protected $signature = 'proyecto:optimizar';
    protected $description = 'Limpia y optimiza la caché, configuración y rutas del proyecto';

    public function handle()
    {
        $this->info('Limpiando y optimizando el proyecto...');

        $this->call('cache:clear');
        $this->info('Caché limpiada.');

        $this->call('config:cache');
        $this->info('Configuración cacheada.');

        $this->call('route:cache');
        $this->info('Rutas cacheadas.');

        $this->call('view:clear');
        $this->info('Vistas limpiadas.');

        $this->call('config:clear');
        $this->info('Configuración limpiada.');

        $this->info('Optimización completada.');
    }
}
