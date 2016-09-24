<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    protected  $skipPresenter = true;

    public function getByIdAndDeliverymen($id, $deliverymen)
    {
        $result = $this->with(array('client', 'items', 'cupoms'))->findWhere(array('id' => $id, 'user_deliverymen_id' => $deliverymen));

        if($result instanceof Collection){
            $result = $result->first();
        }else{
            if(isset($result['data']) && count($result['data']) == 1){
                $result = array(
                    'data' => $result['data'][0]
                );
            }else{
                throw new ModelNotFoundException("Order Não existe");
            }
        }
        return $result;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return OrderPresenter::class;
    }
}
