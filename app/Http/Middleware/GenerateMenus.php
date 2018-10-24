<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Category;

class GenerateMenus
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
        \Menu::make('MyNavBar', function ($menu) {
            
            
            foreach (Category::all() as $cate) {
                $cate = $menu->add($cate->title,['url' => "post/category/$cate->id" , 'class'=>'nav-item']);
                $cate->attr(['class'=>'nav-link']);             
            }
            if (\Auth::check()) {
                $blog = $menu->add('My Blog',['url'=> 'post','class'=> 'nav-item']);
                $blog->attr(['class'=>'nav-link']);
            }            
        });    

        return $next($request);
    }
}
