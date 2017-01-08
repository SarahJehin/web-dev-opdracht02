<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Category;
use App;

class SubscriberController extends Controller
{
    
    public function view_subscribers() {
        $subscribers = Subscriber::all();
        return view('admin/subscribers', ['subscribers' => $subscribers]);
    }
    
    public function add_subscriber(Request $request) {
        
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers,email',
        ]);
        
        //add subscriber to database
        $subscriber = new Subscriber([
            'email' => $request->email,
        ]);
        //dd($subscriber);
        $subscriber->save();
        //send e-mail to subscriber
        
        return redirect(App::getLocale() . '/subscriber_confirmation');
    }
    
    public function get_confirmation() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        return view('subscribed_confirmation', ['categories' => $categories]);
    }
    
    public function delete_subscriber($id) {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect('admin/subscribers_overview');
    }
    
}
