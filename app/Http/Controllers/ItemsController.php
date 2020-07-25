<?php
namespace App\Http\Controllers;

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\Status;
use App\Models\Client;
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
use App\Models\Contact;

class ItemsController extends Controller
{
    public function create()
    {
        $clients =  \App\Models\Client::all('id','company_name');

        return view('items.create', compact('clients'));
    }
    public function store(Request $request)
    {
        //Package
        if ($request->package_type == "package")
        {
            return 0;
        }
        //Simcard
        if ($request->package_type == "simcard")
        {
            return 1;
        }
        //Connectedcar
        if ($request->package_type == "connectedcar")
        {
            return 2;
        }
    }
}
