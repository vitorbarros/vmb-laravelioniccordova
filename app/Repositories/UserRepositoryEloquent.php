<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Models\User;
use CodeDelivery\Validators\UserValidator;

;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    /**
     * Método que retorna todos os entregadores, caso o form seja true, será retornado um array
     * configurado para um field selec em um form, do contrário, será retornado um array de objetos User
     * @param bool $form
     * @return array|mixed
     */
    public function deliveryMen($form = false)
    {
        if ($form) {
            return $this->model->where(array('role' => 'deliverymen'))->lists('name', 'id');
        }
        return $this->findWhere(array('role' => 'deliverymen'));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
