<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserLastAt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
      * هذا ميدل وير يقوم بتحديث وقت آخر نشاط للمستخدم في قاعدة البيانات
        * يتم استخدامه لتحديث الوقت في كل مرة يقوم فيها المستخدم بزيارة صفحة
        * يجب التركيز في هذا الكود عند اضافته الى الكيرنل من حيث الترتيب لانه ياخذ بيانات المستخدم من السيشن فا اذا وضعت بترتيب خاطى لن يطبق
        
         */
        $user = $request->user();
        if ($user) {
            $user->forceFill([
                'last_active_at' => Carbon::now(),
            ])->save();
        }
        return $next($request);
    }
}
