<?php
namespace App\Http\Controllers;

use App\Enums\InvoiceStatus;
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

            return view('items.create', compact('clients'));
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
                    'simcard_client' => $request->simcard_client
                ]
            );

            Session()->flash('flash_message', __('Item successfully added'));
    
            event(new \App\Events\ItemAction($item, self::CREATED));
            Session()->flash('flash_message', __('Item successfully added'));

            return view('items.create', compact('clients'));
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
                    'connectedcar_client' => $request->connectedcar_client
                ]
            );

            Session()->flash('flash_message', __('Item successfully added'));
    
            event(new \App\Events\ItemAction($item, self::CREATED));
            Session()->flash('flash_message', __('Item successfully added'));

            return view('items.create', compact('clients'));
        }
    }

    public function show(Request $request, $external_id)
    {
        $task = $this->findByExternalId($external_id);
        if (!$task) {
            abort(404);
        }
        return view('tasks.show')
            ->withTasks($task)
            ->withUsers(User::with(['department'])->get()->pluck('nameAndDepartmentEagerLoading', 'id'))
            ->with('invoice_lines', $this->getInvoiceLines($external_id))
            ->with('company_name', Setting::first()->company)
            ->withStatuses(Status::typeOfTask()->pluck('title', 'id'))
            ->withProjects($task->client->projects()->pluck('title', 'external_id'))
            ->withFiles($task->documents)
            ->with('filesystem_integration', Integration::whereApiType('file')->first());
    }

}
