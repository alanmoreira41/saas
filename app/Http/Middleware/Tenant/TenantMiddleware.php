<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
use App\Tenant\ManagerTenant;
use Route;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $manager =  app(ManagerTenant::class);
      if($manager->domainIsMain())
      return $next($request);


        
        $company = $this->getCompany($request->getHost());
       
        //dd($company);




        
          if (!$company && $request->url() != route('404.tenant')){
            //abort('404');
          //return response()->view('errors/404_tenant');
          return redirect()->route('404.tenant');
           
          }else if($request->url() != route('404.tenant') && !$manager->domainIsMain()){
           // dd('aqui');
            $manager->setConnection($company);
            
          }
                 
                 
           return $next($request);

           
      
         
        
         
           
        
    }
        public function getCompany($host)
    {
       return Company::where('domain',$host)->first();
    }
}
