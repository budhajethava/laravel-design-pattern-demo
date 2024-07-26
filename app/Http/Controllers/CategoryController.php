<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Strategy\SortingContext;
use App\Adapter\ShopifyApiAdapter;
use App\Adapter\ShopifyApi;
use App\Adapter\ProductFeed;
use App\Adapter\WooCommerceApiAdapter;
use App\Adapter\WooCommerceApi;
use App\Adapter\BigCommerceApiAdapter;
use App\Adapter\BigCommerceApi;
use App\Singleton\TestSingleton;
use App\Helpers\ExternalApiHelper;
use App\Factories\PaymenFactory;

class CategoryController extends Controller
{

    public function __construct(protected CategoryService $categoryService, protected PaymenFactory $paymentFactory) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:categories,name|min:3|max:80',
            'image' => 'required'
        ]);
        $category = $this->categoryService->create($request);
        return redirect('/category')->with('success', 'Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = $this->categoryService->find($id);
            return view('category.manage', compact('category'));
        } catch (\Exception $e) {
            return redirect('/category')->with('error', 'Requested category not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|min:3|max:80|unique:categories,name,$id",
            'image' => !empty($request->oldImage) ? "nullable" : "required"
        ]);
        $category = $this->categoryService->update($request, $id);
        if (!empty($category) && $category) {
            return redirect('/category')->with('success', 'Category has been updated!');
        } else {
            return redirect('/category')->with('error', 'Unable to update category!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryService->delete($id);
            return redirect('/category')->with('success', 'Category has been deleted!');
        } catch (\Exception $e) {
            return redirect('/category')->with('error', 'Requested category not found!');
        }
    }

    /**
     * strategyPattern is used to demonostrate how to implement strategry pattern
     *
     * @author Spec Developer
     * @return array sorting array
     */
    public function strategyPattern()
    {
        $items = [5, 3, 2, 4, 1];
        $sortType = 'quicksort';
        $sortingContext = new SortingContext($sortType);
        $sortedItems = $sortingContext->sort($items);
        echo "Sort using $sortType <pre/>"; print_r($sortedItems);
        echo '<br/>';
        echo '<button type="button" class="btn btn-primary"><a href="/dashboard">Dashboard</a></button>';
    }

    /**
     * adapterPattern is used to demonostrate how to implement adapter pattern
     *
     * @return mixed html of feed
     * @author Spec Developer
     */
    public function adapterPattern()
    {
        $products = [];
        $shopify= new ShopifyApiAdapter(new ShopifyApi());
        $wooCommerce= new WooCommerceApiAdapter(new WooCommerceApi());
        $bigCommerce= new BigCommerceApiAdapter(new BigCommerceApi());

        $productFeed= new ProductFeed([
          $shopify, 
          $wooCommerce,
          $bigCommerce
        ]);

        foreach ($productFeed->getAllProducts() as $product) {
            array_push($products, $product);
        }
        return view('category.products', compact('products'));
    }

    /**
     * adapterPattern is used to demonostrate how to implement factory pattern
     *
     * @return string payment amount string
     * @author Spec Developer
     */
    public function factoryPattern()
    {
        $paymentFactory = new $this->paymentFactory();
        $payment = $paymentFactory->initPayment();
        $result = $payment->charge(100);
        die($result.'<br/><br/><button type="button" class="btn btn-primary"><a href="/dashboard">Dashboard</a></button>');
    }

    /**
     * adapterPattern is used to demonostrate how to implement singleton pattern
     *
     * @return string payment amount string
     * @author Spec Developer
     */
    public function singletonPattern()
    {
        $externalApi1 = ExternalApiHelper::setFoo('Test1');
        $externalApi2 = ExternalApiHelper::setFoo('Test2');
        $externalApi3 = ExternalApiHelper::setFoo('Test3');
        dd($externalApi1->foo(),$externalApi2->foo(),$externalApi3->getFoo());
    }
}
