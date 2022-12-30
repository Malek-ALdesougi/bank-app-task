<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountBalance;
use App\Models\History;
use Dflydev\DotAccessData\Data;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use RealRashid\SweetAlert\Facades\Alert;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        //send all account to the view but without the originals (which they  have childs)
        $date = date('Y-m-d H:i:s');;
        $allAccounts = AccountBalance::where('is_original', 0)->get();
        return view('/create_entry', compact('allAccounts', 'date'));
    }


    public function add(Request $request)
    {
        // Check if the inputs are not empty
        if ($request->credit_account_id == 'Select account' || $request->debit_account_id == 'Select account') {
            Alert::error('Error', 'Account feild is required');
            return back();
        }
        // its consist of only two inputs because i didn't figure it out how to handel the empty inputs is case ::
        elseif ($request->credit_one == 0 || $request->debit_one == 0) {
            Alert::error('Error', 'input must have a value');
            return back();
        } elseif ($request->credit_one !== $request->debit_one) {
            Alert::error('Error', "Both balance sides must be equal");
            return back();
        }


        // debit side : create a new variable of the accountBalance table to update it
        $creditSide = AccountBalance::find($request->credit_account_id);
        $creditSide->credit_balance = $request->credit_one;
        $creditSide->update();

        //credit side : create a new variable of the accountBalance table to update it
        $debitSide = AccountBalance::find($request->debit_account_id);
        $debitSide->debit_balance = $request->debit_one;
        $debitSide->update();

        //adding the new entry to the history table with the neccessary details
        $newHistory = new History;
        $newHistory->credit_account_id = $request->credit_account_id;
        $newHistory->debit_account_id = $request->debit_account_id;
        $newHistory->credit_balance = $request->credit_one;
        $newHistory->debit_balance = $request->debit_one;
        $newHistory->save();

        Alert::success('Success', 'The entry has been recorded successfully');
        return back();
    }


    public function show($id)
    {
        // show the user history depending on his id
        $accountHistoryCredit = History::where('credit_account_id', $id)->get();
        $accountHistoryDebit = History::where('debit_account_id', $id)->get();
        return view('history', compact('accountHistoryCredit', 'accountHistoryDebit'));
    }




    public function allAccounts()
    {
        $allAccounts = AccountBalance::where('is_original', 0)->get();
        return view('all_accounts', compact('allAccounts'));
    }
}
