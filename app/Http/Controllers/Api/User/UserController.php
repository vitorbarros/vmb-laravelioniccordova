<?php
namespace CodeDelivery\Http\Controllers\Api\User;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserController constructor.
     * @param UserRepository $repository
     */
    public function __construct(
        UserRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $id = Authorizer::GetResourceOwnerId();
        $user = $this->repository->find($id);
        return $user;
    }
}