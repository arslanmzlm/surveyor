<?php

namespace App\Http\Middleware;

use App\Helpers\Mutators;
use Closure;
use Illuminate\Http\Request;

class CleanPhone
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $request->all();

        $this->modifyNestedData($data, 'phone', function ($value) {
            return Mutators::cleanPhone($value);
        });

        $this->modifyNestedData($data, 'contact_phone', function ($value) {
            return Mutators::cleanPhone($value);
        });

        $request->merge($data);

        return $next($request);
    }


    /**
     * @param array $data
     * @param string $key
     * @param callable $callback
     * @return void
     */
    private function modifyNestedData(array &$data, string $key, callable $callback): void
    {
        foreach ($data as $arrayKey => &$value) {
            if (is_array($value)) {
                $this->modifyNestedData($value, $key, $callback);
            } elseif ($key === $arrayKey) {
                $value = $callback($value);
            }
        }
    }
}
