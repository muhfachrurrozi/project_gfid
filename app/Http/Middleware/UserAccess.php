<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->dept == 'admin'){
            if(auth()->user()->jabatan == 'admin'){
                return $next($request);
            }
        }elseif(auth()->user()->dept == 'pm'){
                if(auth()->user()->jabatan == 'supervisor'){
                    return $next($request);
                }
            }
        // }elseif(auth()->user()->dept == 'fab'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // } elseif(auth()->user()->dept == 'fab'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'fab'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'fab'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'pm'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'pm'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'pm'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'pm'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ext'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ext'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ext'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ext'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'qc'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'qc'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'qc'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'qc'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'wrh'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'wrh'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'wrh'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'wrh'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ts'){
        //     if(auth()->user()->jabatan == 'manager'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ts'){
        //     if(auth()->user()->jabatan == 'supervisor'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ts'){
        //     if(auth()->user()->jabatan == 'foreman'){
        //         return $next($request);
        //     }
        // }elseif(auth()->user()->dept == 'ts'){
        //     if(auth()->user()->jabatan == 'user'){
        //         return $next($request);
        //     }
        // }

        return response()->json(['You do not have permission to access this page']);
        // return response()->view('error.check-permission');
    }
}