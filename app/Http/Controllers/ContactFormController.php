<?php

namespace App\Http\Controllers;

use App\Models\contactformModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function showContactData()
    {
        $data = contactformModel::all();
        return view('ContactForm.contacts', ['data' => $data]);
    }
    public function getContactFormData(Request $request)
    {

        $data = $request->json()->all();
        fetchAndSaveContactData($data);
    }
}
