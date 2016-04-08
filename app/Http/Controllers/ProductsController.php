<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;

class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Método de renderização de todos os produtos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->repository->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Método que renderiza o formulário de criação de produtos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Método que recebe a requisição do formulário de criação e grava os dados do produto no bando de dados
     * @param AdminProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.products.index');
    }

    /**
     * Método que renderiza o formulário de edição do produto
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Método que recebe a requisição do formulário de edição e atualiza o regoistro no bando de dados
     * @param AdminProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.products.index');
    }

    /**
     * Método que recebe a requisição para deletar um produto
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.products.index');
    }
}
