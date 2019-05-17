@extends('layouts.app')
<head>
        <style>
                .card1 {
                  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                  max-width: 300px;
                  margin: auto;
                  text-align: center;
                  font-family: arial;
                }
                
                .title {
                  color: grey;
                  font-size: 18px;
                }
                
                .button {
                  border: none;
                  outline: 0;
                  display: inline-block;
                  padding: 8px;
                  color: white;
                  background-color: #000;
                  text-align: center;
                  cursor: pointer;
                  width: 100%;
                  font-size: 18px;
                }
                
                .a1 {
                  text-decoration: none;
                  font-size: 22px;
                  color: black;
                }
                
                button:hover, a:hover {
                  opacity: 0.7;
                }
                </style>
</head>
<div class="container">
<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">I'm a</div>
                
                <div class="row">
                    <div class="col-md-3">
                     <div class="card1">
                        <img src="/images/" alt="John" style="width:200px;height:200px;">
                        <h1><a href="{{ route('register1') }}" class="button">Therapist</a></h1>
                        <p class="title"></p>
                        
                        <p> 
                        </p>
                      </div>
                    </div>
                </div>
                    <div class="row">
                            <div class="col-md-3">
                             <div class="card1">
                                <img src="/images/" alt="John" style="width:200px;height:200px;">
                                <h1><a href="{{ route('register2') }}" class="button">Parent</a></h1>
                                <p class="title"></p>
                                
                                <p> 
                                </p>
                              </div>
                            </div>
                    </div>
                  
                 
               
                </div>
            </div>



    </div>
</div>
