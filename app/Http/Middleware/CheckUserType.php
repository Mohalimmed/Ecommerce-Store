<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        /*
      * هذا ميدل وير يقوم بالتحقق من نوع المستخدم
      * إذا كان المستخدم غير مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول
      * إذا كان المستخدم مسجل الدخول ولكن ليس لديه صلاحيه ، يتم إرجاع خطأ 403
         */
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }
        if (!in_array($user->type, $types)) {
            return abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
