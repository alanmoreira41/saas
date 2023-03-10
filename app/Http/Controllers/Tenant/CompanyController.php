<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $company;
public function __construct(Company $company)
{
$this->company = $company;
}

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $company = $this->company->create([
        'name' => 'Empresa x'.Str::random(5), 
        'domain' => Str::random(5).'minhaempresa.com',
        'db_database' =>'mult_tenant'. Str::random(5),
        'db_hostname' =>'mysql',
        'db_username'=>'root',
        'db_password'=>'',
        'cor'=>'#fff',
        
       ]);

       event(new CompanyCreated($company));
        dd($company);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
