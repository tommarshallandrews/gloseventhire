<?php namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Collection\UserCollection;

class UserCollectionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->bind('App\Collection\UserCollection', function() {
            // Our controllers will expect instance of UserCollection
            // so just retrieve the records from database and pass them
            // to new UserCollection object, which simply extends the Collection
            return new UserCollection(User::all()->toArray());
        });

        return $next($request);
    }

}