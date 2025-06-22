<?php

namespace Kseven\FilamentMultiBlog\Http\Middleware;

use Closure;
use Kseven\FilamentMultiBlog\Models\Site;

class DetectSite
{
    /**
     * Detecta e valida o site baseado no domínio da requisição.
     * Verifica se o site existe, está ativo e se não está em manutenção.
     * Registra o site no container para acesso global.
     */
    public function handle($request, Closure $next)
    {
        // 1. Captura o domínio acessado (ex: www.exemplo.com)
        $host = $request->getHost();

        // 2. Busca o site correspondente no banco de dados
        $site = Site::where('domain', $host)->first();

        // 3. Se o site não foi encontrado, retorna 404 personalizado
        if (!$site) {
            return response()->view('errors.site-not-found', [], 404);
        }

        // 4. Se o site estiver em modo de manutenção, exibe a tela 503 personalizada
        if ($site->is_maintenance) {
            return response()->view('errors.site-maintenance', ['site' => $site], 503);
        }

        // 5. Se o site estiver suspenso/inativo, retorna outra tela 503
        if (!$site->is_active) {
            return response()->view('errors.site-suspended', ['site' => $site], 503);
        }

        // 6. Registra o site atual no container da aplicação para uso global
        app()->instance('current_site', $site);

        // 7. Continua o fluxo da requisição normalmente
        return $next($request);
    }
}
