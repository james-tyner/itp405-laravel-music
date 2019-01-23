<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //tells it to use the DB in the global namespace, not look for it in this directory

class InvoicesController extends Controller
{
    public function index(Request $request) { //the $request variable of type Request is the GET/POST from the form
      $query= DB::table('invoices')
        ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId'); //joining tables
      //rows become objects, and the fields all become object properties

      // if the search GET request exists, add a WHERE clause onto the SQLite query
      if ($request->query('search')){
        $query->where('FirstName', '=', $request->query('search'));
        $query->orWhere('LastName', '=', $request->query('search'));
      }

      $invoices = $query->get(); // essentially: select all from invoices database

      // The data passed in the associative array below becomes available in the template... so you can use the data "invoices" in the page using double curly braces to access the data that's been given to the controller
      return view('invoices',[
        'invoices'=>$invoices,
        'search'=>$request->query('search')
      ]);
    }
}
