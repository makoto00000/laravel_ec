<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\UploadImageRequest;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owners');

        // ログインしているオーナー以外のshop情報を表示させない
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('shop');
            if(!is_null($id)){
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id();
                if($shopId !== $ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index() {
        $shops = Shop::where('owner_id', Auth::id())->get();
        return view('owner.shops.index', compact('shops'));
    }
    public function edit(Request $request, $id) {
        $shop = Shop::findOrFail($id);
        return view('owner.shops.edit', compact('shop'));
    }
    public function update(UploadImageRequest $request, $id) {
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/shops', $imageFile); リサイズなしの場合
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName . '.' . $extension;
            $manager = new ImageManager(new Driver());
            $resizedImage = $manager->read($imageFile)->resize(1920, 1080)->encode();
            Storage::put('public/shops/' . $fileNameToStore, $resizedImage);
        }
        return redirect()->route('owner.shops.index');
    }
}
