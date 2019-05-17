@extends('layouts.app')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Kindly provide information of your child for pairing:</div>
                        <form method="POST" action="{{action('ValidationController@motherValidation')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                            {{ csrf_field() }}    
                            <div class="form-group">
                                  <label for="name">Birthday</label>
                                  <input type="date" class="form-control" id="name" name = "name" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                  <label for="age">myKID</label>
                                  <input type="text" class="form-control" id="myKID" name = "myKID" placeholder="myKID">
                                </div>
                                <button class="btn btn-primary btn-success upload-result">Submit</button>
                        </form>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
        </div>
</div>
