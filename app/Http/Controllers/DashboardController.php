<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\SubscriberDetails;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mainTable()
    {
        $subscribers = Subscriber::with('details')->orderBy('updated_at', 'desc')->get();
        return view('dashboard', compact('subscribers'));
    }

    public function addSubscriber(Request $request)
    {
        try {
            $request->validate([
                'lastName' => 'required|string|max:255',
                'firstName' => 'required|string|max:255',
                'middleName' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'gender' => 'required|int',
            ]);

            $subscriber = $request->all();

            Subscriber::create($subscriber);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
        }
    }

    public function addProvider(Request $request)
    {
        try {
            $request->validate([
                'headerID' => 'required|exists:subscriber,id',
                'phoneNumber' => 'required|string|max:11',
                'provider' => 'required|string|max:255',
            ]);

            $subscriber = $request->all();

            SubscriberDetails::create($subscriber);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateSubscriber(Request $request, $id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->update([
            'lastName' => $request->input('lastName'),
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);


        $subscriber->save();

        return redirect()->back();
    }

    public function updateProvider($subscriberId, Request $request, $id)
    {
        $subscriber = Subscriber::find($subscriberId);
        $provider = SubscriberDetails::findOrFail($id);


        $provider->update([
            'provider' => $request->input('provider'),
            'phoneNumber' => $request->input('phoneNumber'),
        ]);

        $provider->save();

        return redirect()->back();
    }

    public function deleteProvider($subscriberId, $providerId)
    {
        $subscriber = Subscriber::findOrFail($subscriberId);
        $subscriberDetails = SubscriberDetails::findOrFail($providerId);
        $subscriberDetails->delete();

        return redirect()->back();
    }


    public function deleteSubscriber(Subscriber $subscriber)
    {
        $subscriber->delete();

        $subscriber->details()->each(function ($detail) {
            $detail->delete();
        });

        return redirect()->back();
    }
}
