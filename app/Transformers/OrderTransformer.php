<?php
namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = [
        'cupom'
    ];
    //protected $availableIncludes = [];

    /**
     * Transform the \Order entity
     * @param Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return array(
            'id' => (int)$model->id,
            'total' => (float)$model->total,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        );
    }

    public function includeCupom(Order $model)
    {
        if (!$model->cupom) {
            return null;
        }
        return $this->item($model->cupom, new CupomTransformer());
    }
}
