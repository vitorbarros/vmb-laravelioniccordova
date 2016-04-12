<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $listStatus = array(
            0 => 'Pendente',
            1 => 'A caminho',
            2 => 'Entregue',
            3 => 'Cancelado'
        );

        $deliveryMan = $this->userRepository->deliveryMen(true);
        $order = $this->repository->find($id);
        return view('admin.orders.edit', compact('order', 'listStatus', 'deliveryMan'));
    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all, $id);
        return redirect()->route('admin.orders.index');
    }
}
