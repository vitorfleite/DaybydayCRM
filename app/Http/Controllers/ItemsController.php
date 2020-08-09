<?php
namespace App\Http\Controllers;

use App\Enums\InvoiceStatus;
use App\Models\User;
use App\Models\Integration;
use App\Models\Industry;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Status;
use App\Models\Client;
use App\Models\Package;
use App\Models\Simcard;
use App\Models\ConnectedCar;
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

use Ramsey\Uuid\Uuid;

class ItemsController extends Controller
{

    const CREATED = 'created';
    const UPDATED_STATUS = 'updated_status';
    const UPDATED_DEADLINE = 'updated_deadline';
    const UPDATED_ASSIGN = 'updated_assign';

    public function index()
    {
        $clients =  \App\Models\Client::all('id','company_name');
        $packages = \App\Models\Package::all('package_number');

        return view('items.index', compact(['clients','packages']));
    }
    
    public function create()
    {
        $clients =  \App\Models\Client::all('id','company_name');
        $packages = \App\Models\Package::all('package_number');

        return view('items.create', compact(['clients','packages']));
    }
    
    public function store(Request $request)
    {
        $clients =  \App\Models\Client::all('id','company_name');
        $packages = \App\Models\Package::all('package_number');
        //Package
        if ($request->package_type == "package")
        {

            $item = Package::create(
                [
                    'package_number' => $request->package_number,
                    'package_status' => $request->package_status,
                    'package_imei' => $request->package_imei,
                    'package_comments' => $request->package_comments,
                    'package_client' => $request->package_client
                ]
            );

            Session()->flash('flash_message', __('Item successfully added'));
    
            event(new \App\Events\ItemAction($item, self::CREATED));
            Session()->flash('flash_message', __('Item successfully added'));

            return redirect()->route('items.create', compact(['clients','packages']));
        }
        //Simcard
        if ($request->package_type == "simcard")
        {
            
            $item = Simcard::create(
                [
                    'simcard_number' => $request->simcard_number,
                    'simcard_status' => $request->simcard_status,
                    'simcard_origin' => $request->simcard_origin,
                    'simcard_operator' => $request->simcard_operator,
                    'simcard_comments' => $request->simcard_comments,
                    'simcard_package' => $request->simcard_package
                ]
            );

            Session()->flash('flash_message', __('Item successfully added'));
    
            event(new \App\Events\ItemAction($item, self::CREATED));
            Session()->flash('flash_message', __('Item successfully added'));

            return redirect()->route('items.create', compact(['clients','packages']));
        }
        //Connectedcar
        if ($request->package_type == "connectedcar")
        {
            $item = ConnectedCar::create(
                [
                    'connectedcar_name' => $request->connectedcar_name,
                    'connectedcar_model' => $request->connectedcar_model,
                    'connectedcar_color' => $request->connectedcar_color,
                    'connectedcar_vin' => $request->connectedcar_vin,
                    'connectedcar_year' => $request->connectedcar_year,
                    'connectedcar_plate' => $request->connectedcar_plate,
                    'connectedcar_comments' => $request->connectedcar_comments,
                    'connectedcar_package' => $request->connectedcar_package
                ]
            );

            Session()->flash('flash_message', __('Item successfully added'));
    
            event(new \App\Events\ItemAction($item, self::CREATED));
            Session()->flash('flash_message', __('Item successfully added'));

            return redirect()->route('items.create', compact(['clients','packages']));
        }
    }
    public function anyDataPackage()
    {
        $items = Package::select(['package_number', 'package_status', 'package_imei', 'package_client']);

        return Datatables::of($items)->make(true);
    }
    public function anyDataSimCard()
    {
        $items = Simcard::select(['simcard_number', 'simcard_status', 'simcard_origin', 'simcard_operator','simcard_package']);

        return Datatables::of($items)->make(true);
    }
    public function anyDataConnectedCar()
    {
        $items = ConnectedCar::select(['connectedcar_name', 'connectedcar_model', 'connectedcar_color','connectedcar_vin', 'connectedcar_year', 'connectedcar_plate', 'connectedcar_package']);

        return Datatables::of($items)->make(true);
    }
    public function show($external_id)
    {
        return 0;
    }

}
