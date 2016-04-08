<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;

class CategoriesController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Método que renderiza a página inicial das categorias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->repository->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Método que renderiza o form de criação de uma categoria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Método que recebe a requisição para criar uma nova categoria
     * @param AdminCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Método que faz a renderização do formulário de edição da categoria
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Método que recebe a requisição para alteração de uma categoria
     * @param AdminCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data,$id);
        return redirect()->route('admin.categories.index');
    }
}
