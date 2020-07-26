<?php
namespace App\Http\Controllers;

use App\Enums\InvoiceStatus;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Status;
use App\Models\Client;
use App\Models\Package;
use App\Repositories\FilesystemIntegration\FilesystemIntegration;
use App\Repositories\Money\MoneyConverter;
use App\Services\ClientNumber\ClientNumberService;
use App\Services\Invoice\InvoiceCalculator;
use App\Services\Search\SearchService;
use App\Services\Storage\GetStorageProvider;
use Carbon\Carbon;
use Config;
use Dinero;
use Datatables;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\User;
use App\Models\Integration;
use App\Models\Industry;
use Ramsey\Uuid\Uuid;

class ItemsController extends Controller
{

    const CREATED = 'created';
    const UPDATED_STATUS = 'updated_status';
    const UPDATED_DEADLINE = 'updated_deadline';
    const UPDATED_ASSIGN = 'updated_assign';

    public function create()
    {
        $clients =  \App\Models\Client::all('id','company_name');

        return view('items.create', compact('clients'));
    }
    public function store(Request $request)
    {
        $clients =  \App\Models\Client::all('id','company_name');
        //Package
        if ($request->package_type == "package")
        {

            $package = Package::create(
                [
                    'package_number' => $request->package_number,
                    'package_status' => $request->package_status,
                    'package_imei' => $request->package_imei,
                    'package_comments' => $request->package_comments,
                    'package_client' => $request->package_client
                ]
            );

            Session()->flash('flash_message', __('Package successfully added'));
    
            event(new \App\Events\ItemAction($package, self::CREATED));
            Session()->flash('flash_message', __('Package successfully added'));

            return view('items.create', compact('clients'));
        }
        //Simcard
        if ($request->package_type == "simcard")
        {
            return $request;
        }
        //Connectedcar
        if ($request->package_type == "connectedcar")
        {
            return $request;
        }
    }
}
