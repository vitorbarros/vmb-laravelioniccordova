<?php
namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * OAuthCheckRole constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) //aqui adicionamos um parametro para o middleware
    {
        $id = Authorizer::GetResourceOwnerId();
        $user = $this->userRepository->find($id);
        if ($user->role != $role) {
            abort(403, 'Access Forbidden');
        }
        return $next($request);
    }
}
