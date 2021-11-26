<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $goods = Goods::with('goodsImages')->get();
        $best_sellers = Goods::with('transactionDetails', 'user', 'goodsImages')
                        ->withSum('transactionDetails', 'qty')
                        ->orderByDesc('transaction_details_sum_qty')
                        ->limit(6)
                        ->get();
        return view('shop.index', compact('goods', 'best_sellers'));
    }

    public function show($id)
    {
        $goods = Goods::with('goodsImages')->find($id);
        return view('shop.detail', compact('goods'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword == null || $keyword == '')
        {
            return redirect()->route('shop.index');
        }

        $goods = Goods::with('goodsImages')->where('name', 'like', '%' . $keyword . '%')->get();

        return view('shop.search', compact('goods', 'keyword'));
    }
}
