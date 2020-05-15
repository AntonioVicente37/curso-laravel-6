<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    public function __construct(Request $request){
        //dd($request->prm1);
        $this->request = $request;
       // $this->middleware('auth');
      /* $this->middleware('auth')->only([
           'create', 'store'
           ]);*/
       /* $this->middleware('auth')->except([
            'index', 'show','create'
            ]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 654;
        $teste3 = [1,2,3,4,5];
        $products = ['TV','Geladeira','Forno','Sofa'];
        /*return view('teste', [
            'teste' => $teste
            ]);*/
            return view('admin.pages.products.index', compact('teste', 'teste2' , 'teste3','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Responsavel por mostrar o formulario de cracao de novo dado ou produto
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('OK');
       /* $request->validate([
            'name' => 'required |min: 3 | max: 255',
            'description' => 'nullable | min: 3 |max: 10000',
            'photo' => 'required | image',
        ]);

        */
        //Via executar o nosso codigo de cadastrar
       // dd($request->all());//responsavel por pegar todos os dados do formulario
        //dd($request->only(['name','description'])); resposanvel por pegar dados especificos do formulario
        //dd($request->description); podemos ver os dados existentes no formulario
       // dd($request->has('description')); Verificamos a existencia do campo com o has nos retorna verdadeiro ou falso
      // dd($request->input('name', 'default')); NOS retorna o valor do campo e podemos passar um valor padrao para ele
     // dd($request->except('_token','name')); utilizado para ignorar dados de a;guns formularios expecificos
        if($request->file('photo')->isValid()){
           // dd($request->file('photo')->store('products')); primeira maneira de guardar imagem no laravel
           $nameFile = $request->name.'.'.$request->photo->extension();//passando o nome no image que sera gravado
           dd($request->file('photo')->storeAs('products',$nameFile));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalhe do produto: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //rota para mostrar o formulario de editar
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //routa para o codigo de edicao do produto
        dd("Editando o produto {{$id}}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
