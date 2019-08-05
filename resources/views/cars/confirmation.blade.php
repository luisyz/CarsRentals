<?php
session_start();
// 
// $msg = "Hello " . $id->fullname . "\nHere is some information about your reservation:\n
// Reservation id: " . $id->id . "\n
// Pick Up location: " . \App\Location::find($id->pickup_id)->branch ."\n
// Pick Up Date: " . $id->pickup_date. "\n
// Return Location: " . \App\Location::find($id->return_id)->branch ."\n
// Return Date: " . $id->return_date . ".\n
// Ammount left to Pay: " . $id->toPay . "\n
// If you want to see the rest of your reservation go to our website\n
// THANK YOU for choosing us!";
//
//
// mail($id->email,"Your AVIS Reservation",$msg);

 ?>
@extends('master')
@section('content')
    <h1>Your reservation is complete</h1>
    <hr/>
    <h3>your reservation id is: {{$id->id}}</h3>
    <h3>under the name of: {{$id->fullname}}</h3>
    <hr/>

    @endsection
