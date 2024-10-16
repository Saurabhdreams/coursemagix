<?php

namespace App\Http\Controllers;

use App\Models\BasicExtended;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;
use App\Models\User\Language as UserLanguage;
use App\Models\User\UserPermission;
use App\Models\User\UserVcard;
use Illuminate\Http\Request;
use Artisan;
use DB;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    public function version()
    {
        return view('updater.version');
    }

    public function filesFolders($src, $des)
    {
        $dir = $src; //"path/to/targetFiles";
        $dirNew = $des; //path/to/destination/files
        // Open a known directory, and proceed to read its contents
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    echo '<br>Archivo: ' . $file;
                    //exclude unwanted
                    if ($file == "move.php") continue;
                    if ($file == ".") continue;
                    if ($file == "..") continue;
                    if ($file == "viejo2014") continue;
                    if ($file == "viejo2013") continue;
                    if ($file == "cgi-bin") continue;
                    //if ($file=="index.php") continue; for example if you have index.php in the folder

                    if (rename($dir . '/' . $file, $dirNew . '/' . $file)) {
                        echo " Files Copyed Successfully";
                        echo ": $dirNew/$file";
                        //if files you are moving are images you can print it from
                        //new folder to be sure they are there
                    } else {
                        echo "File Not Copy";
                    }
                }
                closedir($dh);
            }
        }
    }

    public function recurse_copy($src, $dst)
    {
        // dd(base_path($src), base_path($dst));
        $dir = opendir(base_path($src));
        @mkdir(base_path($dst), 0775, true);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir(base_path($src) . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy(base_path($src . '/' . $file), base_path($dst) . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function upversion(Request $request)
    {

        $assets = array(

            //ecommerce asset
            ['path' => 'assets/tenant/ecommerce', 'type' => 'folder', 'action' => 'add'],
            ['path' => 'assets/tenant/image/static', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/img/loader.svg', 'type' => 'file', 'action' => 'add'],
            //front assets
            ['path' => 'assets/front/css', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/js', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/theme_4_5_6/assets/js', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/theme_4_5_6/assets/css', 'type' => 'folder', 'action' => 'replace'],
            //tenant asstes
            ['path' => 'assets/tenant/css', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/tenant/js', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'database/migrations', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'resources/views', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'app', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'routes/web.php', 'type' => 'file', 'action' => 'replace'],
            ['path' => 'composer.json', 'type' => 'file', 'action' => 'replace'],
            ['path' => 'composer.lock', 'type' => 'file', 'action' => 'replace'],
            ['path' => 'version.json', 'type' => 'file', 'action' => 'replace']
        );
        foreach ($assets as $key => $asset) {
            $des = '';
            if (strpos($asset["path"], 'assets/') !== false) {
                $des = 'public/' . $asset["path"];
            } else {
                $des = $asset["path"];
            }
            // if updater need to replace files / folder (with/without content)
            if ($asset['action'] == 'replace') {
                if ($asset['type'] == 'file') {
                    copy(base_path('public/updater/' . $asset["path"]), base_path($des));
                }
                if ($asset['type'] == 'folder') {
                    $this->delete_directory(base_path($des));
                    $this->recurse_copy('public/updater/' . $asset["path"], $des);
                }
            }
            // if updater need to add files / folder (with/without content)
            elseif ($asset['action'] == 'add') {

                if ($asset['type'] == 'folder') {

                    $this->recurse_copy('public/updater/' . $asset["path"], $des);
                }
            }
        }

        $arr = ['WEBSITE_HOST' => $request->website_host];
        setEnvironmentValue($arr);
        $this->updateLanguage();
        Artisan::call('config:clear');
        // run migration files
        Artisan::call('migrate');

        //user Language keyword
        $langs = UserLanguage::all();
        $newKeys = [
            "tenant_offline_payment_success_text" => "Your Order Successfully Completed !",
            "play_video" => "Play Video",
            "courses" => "courses",
            "see_all_course" => "See All Course",
            "enroll_now" => "Enroll Now",
            "lessons" => "Lessons",
            "lesson" => "Lesson",
            "no_lesson" => "No Lesson",
            "view_more" => "View More",
            "all" => "All",
            "Our_latest_courses" => "Our Latest Courses",
            "subscribe" => "Subscribe",
            "enter_email_here" => "Enter Email Here",
            "latest_post" => "Latest Post",
            "Filter_By_Price" => "Filter By Price",
            "On_Sale" => "On Sale",
            "Flash_Sale" => "Flash  Sale",
            "Filter" => "Filter",
            "Shop" => "Shop",
            "Sort_By" => "Sort By",
            "Oldest" => "Oldest",
            "Price" => "Price",
            "Price_Hight_to_Low" => "Price_Hight_to_Low",
            "Price_Low_to_High" => "Price_Low_to_High",
            "ITEMS" => "ITEMS",
            "Cart_Total" => "Cart Total",
            "Total_Items" => "Total Items",
            "Item" => "Item",
            "Quantity" => "Quantity",
            "Total" => "Total",
            "Remove" => "Remove",
            "Update" => "Update",
            "Checkout" => "Checkout",
            "Shipping_Details" => "Shipping Details",
            "Method" => "Method",
            "Cost" => "Cost",
            "Order_Summary" => "Order Summary",
            "Cart_Empty" => "Cart Empty",
            "Order" => "Order",
            "Discount" => "Discount",
            "Subtotal" => "Subtotal",
            "Shipping_Charge" => "Shipping Charge",
            "Tax" => "Tax",
            "Coupon_Already_Applied" => "Coupon Already Applied",
            "Coupon" => "Coupon",
            "Apply" => "Apply",
            "Payment_Method" => "Payment Method",
            "Choose_an_option" => "Choose an option",
            "CVC" => "CVC",
            "Month" => "Month",
            "Year" => "Year",
            "Expire_Month" => "Expire Month",
            "Place_Order" => "Place Order",
            "Success" => "Success",
            "Go_to_Dashboard" => "Go To Dashboard",
            "payment_success" => "payment success",
            "item_order_payment_success_msg" => "Order Payment Success",
            "Go_to_Home" => "Go to Home",
            "payment_error" => "payment error",
            "SKU" => "SKU",
            "Share_Now" => "Share Now",
            "Description" => "Description",
            "Reviews" => "Reviews",
            "Related_Items" => "Related Items",
            "Add_to_cart" => "Add to cart",
            "Add_To_Wishlist" => "Add To Wishlist",
            "Remove_From_Wishlist" => "Remove From Wishlist",
            "Cart" => "Cart",
            "Billing_Details" => "Billing Details",
            "My_Orders" => "My Orders",
            "My_Wishlist" => "My Wishlist",
            "Shipping_Details" => "Shipping Details",
            "order_number" => "order number",
            "date" => "date",
            "total" => "total",
            "status" => "status",
            "item" => "item",
            "title" => "title",
            "Address" => "Address",
            "See_All_Course" => "See All Course",
            "no_about_us_found" => "No About Us Found !",
            "no_items" => "No Itemes Found !",
            "Out_of_Stock" => "Out of Stock"
        ];
        foreach ($langs as $key => $lang) {
            $keyArr = json_decode($lang->keywords, true);
            foreach ($newKeys as $key => $newKey) {
                $keyArr["$key"] = $newKey;
            }
            $lang->keywords = json_encode($keyArr);
            $lang->save();
        }
        \Session::flash('success', 'Updated successfully');
        return redirect('updater/success.php');
    }

    function delete_directory($dirname)
    {
        $dir_handle = null;
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else
                    $this->delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    public function updateLanguage()
    {
        $langCodes = [];
        $languages = Language::all();
        foreach ($languages as $key => $language) {
            $langCodes[] = $language->code;
        }
        $langCodes[] = 'default';

        foreach ($langCodes as $key => $langCode) {
            // read language json file
            $data = file_get_contents(base_path('resources/lang/' . $langCode . '.json'));

            // decode default json
            $json_arr = json_decode($data, true);


            // new keys
            $newKeys =
                [
                    "Ecommerce" => "Ecommerce",
                ];
            foreach ($newKeys as $key => $newKeyword) {
                // # code...
                if (!array_key_exists($key, $json_arr)) {
                    $json_arr[$key] = $key;
                }
            }

            // push the new key-value pairs in language json files
            file_put_contents(base_path('resources/lang/' . $langCode . '.json'), json_encode($json_arr));
        }
    }

    public function redirectToWebsite(Request $request)
    {
        $arr = ['WEBSITE_HOST' => $request->website_host];
        setEnvironmentValue($arr);
        \Artisan::call('config:clear');

        return redirect()->route('front.index');
    }
}
