<?php

namespace App\Http\Controllers\Ecommerce\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Ecommerce\UserItem;
use App\Models\Ecommerce\ItemReview;
use App\Models\User\BasicSetting;
use App\Models\BasicSetting as BS;
use Illuminate\Support\Facades\DB;
use App\Models\BasicExtended as BE;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\UserItemContent;
use App\Models\Ecommerce\UserShopSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\CustomerWishList;
use App\Models\Ecommerce\UserItemCategory;
use Illuminate\Support\Facades\Config;
use App\Models\Ecommerce\UserItemSubCategory;
use App\Models\User\Language as UserLanguage;
use App\Models\User\SEO;

class ShopController extends Controller
{
    public function __construct()
    {
        $bs = BS::first();
        $be = BE::first();
    }
    public function shop(Request $request, $domain)
    {

        $user = getUser();
        $userShop = UserShopSetting::where('user_id', $user->id)->first();
        if (!empty($userShop) && ($userShop->is_shop == 0)) {
            return redirect()->route('front.user.detail.view', getParam());
        }
        $userCurrentLang = $this->getUserCurrentLanguage($user->id);
        $data['seoInfo'] = SEO::query()
            ->where('user_id', $user->id)
            ->select('courses_meta_keywords', 'courses_meta_description')
            ->first();
        $data['pageHeading'] = $this->getUserPageHeading($userCurrentLang, $user->id);
        $data['bgImg'] = $this->getUserBreadcrumb($user->id);





        $cat = UserItemCategory::where('slug', $request->category)->where('language_id', $userCurrentLang->id)->where('user_id', $user->id)->first();
        $subcat = UserItemSubCategory::where('slug', $request->subcategory)->where('language_id', $userCurrentLang->id)->where('user_id', $user->id)->first();
        $search = $request->search;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $category_id = $cat->id ?? '';
        $subcategory_id = $subcat->id ?? '';
        $sale = $request->sale;
        if ($request->type) {
            $type = $request->type;
        } else {
            $type = 'new';
        }
        $limit = 9;
        if (Auth::guard('customer')->check()) {
            $data['myWishlist'] = CustomerWishList::where('customer_id', Auth::guard('customer')->user()->id)->pluck('item_id')->toArray();
        } else {
            $data['myWishlist'] = [];
        }
        $bs = BasicSetting::where('user_id', $user->id)->first();
        Config::set('app.timezone',  $bs->timezoneinfo->timezone ?? 'Europe/Andorra');
        $data['categories'] = UserItemCategory::where('user_id', $user->id)->where('language_id', $userCurrentLang->id)->with('subcategories')->orderBy('name', 'asc')->get();

        $data['items'] = DB::table('user_items')
            ->Join('user_item_contents', 'user_items.id', '=', 'user_item_contents.item_id')
            ->select('user_items.*', 'user_items.id AS item_id', 'user_item_contents.*')
            ->when($category_id, function ($query, $category_id) {
                return $query->where('user_item_contents.category_id', $category_id);
            })
            ->when($subcategory_id, function ($query, $subcategory_id) {
                return $query->where('user_item_contents.subcategory_id', $subcategory_id);
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('user_item_contents.title', 'like', '%' . $search . '%')
                        ->orWhere('user_item_contents.tags',  'like', '%' . $search . '%');
                });
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('user_items.current_price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('user_items.current_price', '<=', $maxprice);
            })
            ->when($type, function ($query, $type) {
                if ($type == 'new') {
                    return $query->orderBy('user_items.id', 'DESC');
                } elseif ($type == 'old') {
                    return $query->orderBy('user_items.id', 'ASC');
                } elseif ($type == 'high-to-low') {
                    return $query->orderBy('user_items.current_price', 'DESC');
                } elseif ($type == 'low-to-high') {
                    return $query->orderBy('user_items.current_price', 'ASC');
                }
            })
            ->when($sale, function ($query, $sale) use ($bs) {
                if ($sale == 'flash') {
                    return $query->where('user_items.start_date_time', '<=', Carbon::now()->tz($bs->timezoneinfo->timezone)->format('Y-m-d H:i:s A'))
                        ->where('user_items.end_date_time', '>=', Carbon::now()->tz($bs->timezoneinfo->timezone)->format('Y-m-d H:i:s A'));
                } elseif ($sale == 'onsale') {
                    return  $query->Where(function ($query) use ($bs) {
                        $query->where('user_items.start_date_time', '<=', Carbon::now()->tz($bs->timezoneinfo->timezone)->format('Y-m-d H:i:s A'))
                            ->where('user_items.end_date_time', '>=', Carbon::now()->tz($bs->timezoneinfo->timezone)->format('Y-m-d H:i:s A'))
                            ->orWhere('user_items.previous_price', '>', 0);
                    });
                } elseif ($sale == 'all') {
                    return $query->orderBy('user_items.id', 'DESC');
                }
            })
            ->where('user_item_contents.language_id', $userCurrentLang->id)
            ->where('user_items.status', 1)
            ->where('user_items.user_id', $user->id)
            ->paginate($limit);
        $data['max_price'] = UserItem::where('user_id', $user->id)->where('status', 1)->max('current_price');
        $data['min_price'] = UserItem::where('user_id', $user->id)->where('status', 1)->min('current_price');
        $data['all_items'] = UserItem::where('user_id', $user->id)->where('status', 1)->count();



        return view('user-front.ecommerce.shop', $data);
    }

    public function adDetails(Request $request, $domain, $slug)
    {
        $user = getUser();
        $userCurrentLang = $this->getUserCurrentLanguage($user->id);
        $data['pageHeading'] = $this->getUserPageHeading($userCurrentLang, $user->id);
        $data['bgImg'] = $this->getUserBreadcrumb($user->id);

        $data['ad_details'] = UserItemContent::where('language_id', $userCurrentLang->id)->with('item.sliders', 'variations')->where('slug', $slug)->firstOrFail();
        // dd($data['ad_details']);
        $data['relateditems'] =  $data['user_items'] = DB::table('user_items')->where('user_items.user_id', '=', $user->id)->where('user_items.status', 1)
            ->Join('user_item_contents', 'user_items.id', '=', 'user_item_contents.item_id')
            ->join('user_item_categories', 'user_item_contents.category_id', '=', 'user_item_categories.id')
            ->select('user_items.*', 'user_item_contents.*', 'user_item_categories.name AS category')
            ->where('user_items.id', '!=', $data['ad_details']->item->id)
            ->where('user_item_categories.language_id', '=', $userCurrentLang->id)
            ->where('user_item_contents.language_id', '=', $userCurrentLang->id)
            ->where('user_item_contents.category_id', '=', $data['ad_details']->category_id)
            ->limit(6)
            ->get();
        $data['user'] = $user;
        $data['reviews'] = ItemReview::where('item_id', $data['ad_details']->item_id)->orderBy('id', 'desc')->get();
        if (Auth::guard('customer')->check()) {
            $data['myWishlist'] = CustomerWishList::where('customer_id', Auth::guard('customer')->user()->id)->pluck('item_id')->toArray();
        } else {
            $data['myWishlist'] = [];
        }
        return view('user-front.ecommerce.item-details', $data);
    }
}
