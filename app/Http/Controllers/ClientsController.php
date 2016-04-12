<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{

    /**
     * @var ClientRepository
     */
    private $repository;

    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    /**
     * Método que renderiza a página inicial das categorias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Método que renderiza o form de criação de uma categoria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Método que recebe a requisição para criar uma nova categoria
     * @param AdminClientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->clientService->create($data);
        return redirect()->route('admin.clients.index');
    }

    /**
     * Método que faz a renderização do formulário de edição da categoria
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Método que recebe a requisição para alteração de uma categoria
     * @param AdminClientRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();
        $this->clientService->update($data,$id);
        return redirect()->route('admin.clients.index');
    }
}
