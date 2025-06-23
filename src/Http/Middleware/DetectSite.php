<?php

namespace Kseven\FilamentMultiBlog\Http\Middleware;

use Closure;
use Kseven\FilamentMultiBlog\Models\Site;

class DetectSite
{
    /**
     * EN:
     * Detects and validates the site based on the request of the request. 
     * Checks if the site exists, it is active and if it is not under maintenance. 
     * Records the site on the container for global access. 
     * ----------------------------------------------------------------
     * PT:
     * Detecta e valida o site baseado no domínio da requisição.
     * Verifica se o site existe, está ativo e se não está em manutenção.
     * Registra o site no container para acesso global.
     */
    public function handle($request, Closure $next)
    {
        // 1. Capture the Domain Accessed (Ex: www.exemplo.com)
        // 1. Captura o domínio acessado (ex: www.exemplo.com)
        $host = $request->getHost();

        // 2. Search the corresponding site in the database
        // 2. Busca o site correspondente no banco de dados
        $site = Site::where('domain', $host)->first();

        // 3. If the site was not found, it returns 404 personalized
        // 3. Se o site não foi encontrado, retorna 404 personalizado
        if (!$site) {
            return response()->view('errors.site-not-found', [], 404);
        }

        // 4. If the site is in maintenance mode, displays the 503 Custom screen
        // 4. Se o site estiver em modo de manutenção, exibe a tela 503 personalizada
        if ($site->is_maintenance) {
            return response()->view('errors.site-maintenance', ['site' => $site], 503);
        }

        // 5. If the site is suspended/inactive, return another screen 503
        // 5. Se o site estiver suspenso/inativo, retorna outra tela 503
        if (!$site->is_active) {
            return response()->view('errors.site-suspended', ['site' => $site], 503);
        }

        // 6. records the current site in the application container for global use
        // 6. Registra o site atual no container da aplicação para uso global
        app()->instance('current_site', $site);

        // 7. continues the flow of the request normally
        // 7. Continua o fluxo da requisição normalmente
        return $next($request);
    }
}
