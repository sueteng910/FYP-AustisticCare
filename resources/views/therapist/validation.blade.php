@extends('layouts.app')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Kindly provide the information:</div>
                        <form method="POST" action="{{action('ValidationController@theraValidation')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                            {{ csrf_field() }}    
                            <div class="form-group">
                                  <label for="name">Profile Picture</label>
                                  <div class="form-group">
                              
                                    <strong>Select Image:</strong>
                                        <br/>
                                        <input type="file" id="profile_pic" name= "profile_pic">
                                        <br/>
                                
                                
                                       
                                      </div>
                                             </div>
                                            <div class="form-group">
                                                    <label for="name">Photocopy of IC</label>
                                                        <div class="form-group">
                                                                    
                                                <strong>Select Image:</strong>
                                                     <br/>
                                                 <input type="file" id="ic_pic" name= "ic_pic">
                                                     <br/>
                                                                      
                                                                      
                                                                             
                                             </div>
                                   </div>
                                <button class="btn btn-primary btn-success upload-result">Submit</button>
                        </form>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
        </div>
</div>
