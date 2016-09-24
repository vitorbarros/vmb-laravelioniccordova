<?php
namespace CodeDelivery\Http\Controllers\Api\Deliverymen;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $orderService;

    private $with = array('client', 'cupoms', 'items');

    /**
     * ClientCheckoutController constructor.
     * @param OrderRepository $orderRepository
     * @param UserRepository $userRepository
     * @param OrderService $orderService
     */
    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        OrderService $orderService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $id = Authorizer::GetResourceOwnerId();
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->scopeQuery(function ($query) use ($id) {
            return $query->where('user_deliverymen_id', '=', $id);
        })->paginate();

        return $orders;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $idDeliverymen = Authorizer::GetResourceOwnerId();
        return $this->orderRepository
            ->skipPresenter(false)
            ->getByIdAndDeliverymen($id, $idDeliverymen);
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliverymen = Authorizer::GetResourceOwnerId();
        $order = $this->orderService->updateStatus($id, $idDeliverymen, $request->get('status'));
        if($order){
            return $this->orderRepository->find($order->id);
        }
        abort(400, "Order não enontrada");
    }
}
