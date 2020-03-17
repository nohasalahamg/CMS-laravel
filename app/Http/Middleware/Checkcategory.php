<?php

namespace App\Http\Middleware;

use Closure;

use App\category;
class Checkcategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      $count= category::all()->count();

  if($count==0){

    
    session()->flash('errorcategory','sorry .. You need To Add Some Categories');

       return redirect(route('category.index'));


  }
        return $next($request);
    }
}
