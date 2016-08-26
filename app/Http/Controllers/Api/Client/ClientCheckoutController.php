<?php
namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
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
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * ClientCheckoutController constructor.
     * @param OrderRepository $orderRepository
     * @param UserRepository $userRepository
     * @param ProductRepository $productRepository
     * @param OrderService $orderService
     */
    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        ProductRepository $productRepository,
        OrderService $orderService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $id = Authorizer::GetResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;

        $orders = $this->orderRepository->with('items')->scopeQuery(function ($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;

    }

    /**
     * @param CheckoutRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function store(CheckoutRequest $request)
    {
        $id = Authorizer::GetResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;

        $data = $request->all();
        $data['client_id'] = $clientId;
        $order = $this->orderService->create($data);

        $orderWithItems = $this->orderRepository->with('items')->find($order->id);
        return $orderWithItems;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $order = $this->orderRepository->with(array('items', 'client', 'cupoms'))->find($id);
        return $order;
    }
}
