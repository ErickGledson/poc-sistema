<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->level > 1)
                return Redirect::to('/');

            return $next($request);
        });
    }

    public function index()
    {
        $products = \App\Product::all();

        foreach ($products as $key => $product) {
            switch ($product->category_id) {
                case 1:
                    $product['category'] = 'Games';
                    break;
                case 2:
                    $product['category'] = 'TV';
                    break;
                case 3:
                    $product['category'] = 'Som';
                    break;
            }

            switch ($product->provider_id) {
                case 1:
                    $product['provider'] = 'Microsoft';
                    break;
                case 2:
                    $product['provider'] = 'Samsung';
                    break;
                case 3:
                    $product['provider'] = 'Phillips';
                    break;
            }
        }

        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $productInput = $request->all();
        $path = "";

        if ($request->hasFile('image')) {
            $path = $this->resizeImageAndSave($request->file('image'));
        }

        $product = new Product;
        $product->name = $productInput['name'];
        $product->description = $productInput['description'];
        $product->price = $productInput['price'];
        $product->stock = $productInput['stock'];
        $product->category_id = $productInput['category_id'];
        $product->provider_id = $productInput['provider_id'];
        $product->provider_product_id = $productInput['provider_product_id'];
        $product->image = $path;
        $product->save();

        Session::flash('message', 'Cadastrado com sucesso!');
        return Redirect::to('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        // Esse Switch representa a fonte de dados de categorias
        switch ($product->category_id) {
            case 1:
                $product['category'] = 'Games';
                break;
            case 2:
                $product['category'] = 'TV';
                break;
            case 3:
                $product['category'] = 'Som';
                break;
        }

        switch ($product->provider_id) {
            case 1:
                $product['provider'] = 'Microsoft';
                break;
            case 2:
                $product['provider'] = 'Samsung';
                break;
            case 3:
                $product['provider'] = 'Phillips';
                break;
        }

        return view('product.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, $id)
    {
        $productInput = $request->all();
        $path = "";

        if ($request->hasFile('image')) {
            $path = $this->resizeImageAndSave($request->file('image'));
        }

        $product = Product::find($id);
        $product->name = $productInput['name'];
        $product->description = $productInput['description'];
        $product->price = $productInput['price'];
        $product->stock = $productInput['stock'];
        $product->category_id = $productInput['category_id'];
        $product->provider_id = $productInput['provider_id'];
        $product->provider_product_id = $productInput['provider_product_id'];
        $product->image = $path;

        if (!$product->save()) {
            $message = 'Ocorreu um erro ao atualizar';
            Session::flash('message', $message);
            return redirect('products.edit')->withInput();
        }

        $message = 'Atualizado com sucesso!';
        Session::flash('message', $message);
        return redirect('products');
    }

    public function destroy($id)
    {
        if ($id) {
            $product = Product::find($id);
            if ($product->delete())
                $message = "Deletado com sucesso";
            else
                $message = "Ocorreu um erro ao deletar";
        } else {
            $message = "É necessário um ID válido";
        }

        Session::flash('message', $message);
        return redirect('products');
    }

    private function resizeImageAndSave ($image) {
        $imageType = $image->getClientOriginalExtension();
        $filename = uniqid('img_') . "." . $imageType;

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(400,200);
        $path = '/images/' . $filename;
        $image_resize->save(public_path($path));
        return $path;
    }
}
