<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Mail\AdminAppointmentNotification;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $appointment = Appointment::query();

        if (!empty($keyword)) {
            $appointment->where('title', 'like', "%$keyword%");
        }
        $appointmentData = $appointment->paginate(5);

        return view('appointment.index',compact('appointmentData'));
    }

//    public function create(){
//        return view('appointment.create');
//    }

    public function store(AppointmentRequest $request){
    //    dd($request);
        $appointment=Appointment::create($request->all());
        if($appointment){
            Mail::to($request->email)->send(new AppointmentCreated($appointment));
            $adminEmail = 'chandan84yadav@gmail.com';

            Mail::to($adminEmail)->send(new AdminAppointmentNotification($appointment));
        }
        return redirect()->route('thankyou')->with('success', 'Appointment  created successfully.');
    }

//    public function edit(Appointment $appointment){
//
//        return view('appointment.edit',compact('appointment'));
//    }
//
//    public function update(Appointment $appointment , AppointmentRequest $request){
//        $appointmentData = $request->all();
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('public/appointment');
//            $appointmentData['image'] = str_replace('public/', '', $imagePath);
//        }
//
//        $appointment->update($appointmentData);
//
//        return redirect()->route('appointment.index')->with('success', 'appointment item successfully updated');
//    }


    public function delete(Appointment $appointment){
        $appointment->delete();
        return redirect()->route('appointment.index')->with('error','Successfully  appointment items deleted');

    }
    public function duplicate(Appointment $appointment){
        $productDuplicate=$appointment->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }


}
