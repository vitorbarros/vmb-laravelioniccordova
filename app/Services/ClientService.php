<?php
namespace CodeDelivery\Services;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data, $id)
    {
        //fazendo o update na tabela do client
        $this->clientRepository->update($data, $id);

        //buscando o id do user
        $userId = $this->clientRepository->find($id, array('user_id'))->user_id;

        //alterando os dados na tabela do user
        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
        //alterando os dados na tabela do user
        $data['user']['password'] = bcrypt('client');
        $userId = $this->userRepository->create($data['user'])->id;

        //fazendo o update na tabela do client
        $data['user_id'] = $userId;
        $this->clientRepository->create($data);
    }
}