<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPropertyId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->has('id')){
            return response()->json([
                'message' => 'Missing id'
            ], 400);
        }

        $id = $request->input('id');
        $property = Property::find($id);
        if(!$property){
            return response()->json([
                'message' => 'Invalid id'
            ], 404);
        }

        return $next($request);
    }
}
