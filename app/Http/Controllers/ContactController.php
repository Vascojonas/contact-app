<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
class ContactController extends Controller
{
    public function index(){
        
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All company', " ");
        
        //\DB::enableQueryLog();
        $contacts = Contact::latestFirst()->paginate(10);
        //dd(\DB::getQueryLog());
        ///$contacts = Contact::latestFirst()->filter()->paginate(10); //replace filer with a gloabal scope for filter in code above


        /*
        //the comand where was replaced by scope filter() from contact Model
        $contacts = Contact::latestFirst()->where(function($query){
            if($companyId=request('company_id')){
                $query->where('company_id', $companyId);
            }

            if($search=request('search')){
                $query->where('first_name', 'like', "%{$search}%");
            }
        })->paginate(10);
        */
       
        return view('contacts.index', compact('contacts', 'companies') );
    }

    public function create(){
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All company', " ");
        return view('contacts.create', compact('companies', 'contact'));
        
    }

    public function show($id){
        $contact=Contact::findOrFail($id);
         return view('contacts.show', compact('contact')); //['contact'=>$contact]
    }

    public function store(Request $request){
        
        $request-> validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'company_id'=>'required|exists:companies,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been add successfuly');

        //dd($request->all());
         //dd($request->only('first_name', 'email'));
         //dd($request->except('first_name', 'email'));

    }

    public function edit($id){
        $contact=Contact::findOrFail($id);
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All company', " ");

        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update($id, Request $request){
        $request-> validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'company_id'=>'required|exists:companies,id',
        ]);

        $contact= Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been Update successfuly');
    }

    public function destroy($id){
        $contact=Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', 'Contact has been delete successfuly');
    }
}

?>