@extends('layouts.app')
@section('title','Mes information')

@section('content')
    <div class="container bg-dark-primary">
        <div class="row">
            <div class="col-md-12 separate text-center">
                <h2>Mes information</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                @if($errors->any())
               <div id="error-box">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                - {!! $error !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endforeach
        </div>
      @endif  
            </div>


            <div class="col-md-6">
                <h5 class="font-weight-bold text-light">
                    <i class="fas fa-file-invoice-dollar text-light"></i>
                    Adresse de livraison</h5>
                   <hr>
                <form id="payment-form" action="{{route('checkout.store')}}" method="POST" class="py-2">
                    @csrf
                    <div class="form-group">
                      <label for="email" id="required_mail" class="text-light">* Email address</label>
                      @if(auth()->user())
                    <input type="email" class="my-in" name="email" id="email" value="{{auth()->user()->email}}" placeholder="name@example.com">
                    @else
                    <input type="email" class="my-in" name="email" id="email" value="{{old('email')}}" placeholder="name@example.com">

                    @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" id="required_name" class="text-light">* Nom et prénom</label>
                        <input type="text" class="my-in" name="name" id="name" placeholder="Nom" value="{{old('name')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1" id="required_adresse" id="required_line1" class="text-light">* Adresse</label>
                        <input type="text" class="my-in" name="adresse" value="{{old('adresse')}}" id="adresse" placeholder="Apartement B ...">
                      </div>
                      <div class="form-group row">
                        <div class="col">
                            <label for="exampleFormControlSelect1" id="required_ville" class="text-light">* Ville</label>
                            <select class="my-in" id="city" name="city">
                            @foreach (App\City::all()->sortByDesc("ville") as $item)
                                <option {{$item->id == 238 ? 'selected' : ''}} value="{{$item->region_id}}">{{$item->ville}}</option>
                            @endforeach
                            </select>
                          </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" id="required_province" class="text-light">* Province</label>
                            <input type="text" class="my-in " name="province" value="{{old('province')}}" id="province" placeholder="Province">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col">
                            <label for="exampleFormControlInput1" id="required_postalcode" class="text-light">* Code postal</label>
                            <input type="text" class="my-in" name="code" value="{{old('code')}}" id="postalcode" placeholder="">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="text-light">* Télephone</label>
                            <input type="text" class="my-in" id="phone" name="phone"  value="{{old('phone')}}" placeholder="+212">
                        </div>
                      </div>
                       

                      <div class="box-methodes">
                        <div class="form-check my-4">
                            <input class="form-check-input" type="radio" name="delivery" id="exampleRadios2" value="delivery" checked >
                            <label class="form-check-label text-light" for="exampleRadios2">
                                Paiement à la livraison
                            </label>
                          </div>
                          <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="delivery" id="exampleRadios3" value="paypal" disabled>
                            <label class="form-check-label text-light" for="exampleRadios3">
                                Paypal 
                            </label>
                          </div>
                      </div>
                    
                          <div class="col text-center">
                            <button type="submit" class="m-btn">Confirmer ma commande</button>
                        </div>

                      </form>
              </div>

                <div class="col-md-6 d-none d-md-block ">
                    <h5 class="font-weight-bold text-light">
                        <i class="fas fa-receipt text-success text-light"></i>
                        Votre commande
                    </h5>
                    <ul class="navbar-nav">
                        @foreach (Cart::content() as $item)
                        <li class="nav-item bg-dark-secondary text-left shadow-sm p-2 mb-2">
                            <img src="{{productImage($item->model->image)}}" alt="" width="70" class="img-fluid">
                            <div class="ml-3 d-inline-block text-light ">
                            <h5 class="mb-0">{{$item->model->name}}</h5>
                            <span>{{getPrice($item->model->price)}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="list-unstyled text-light mb-4">
                    
                        <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Sous total</strong><strong>{{getPrice($newSubtotal)}}</strong></li>
                        <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Livraison</strong><strong>Gratuite</strong></li>
                        <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Tax</strong><strong>{{getPrice($newTax)}}</strong></li>
                        <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Total</strong>
                          <h5 class="font-weight-bold">{{getPrice($newTotal)}}</h5>
                        </li>


                        </li>
                      </ul>
                </div>
             
            </div>
        </div>
 
@endsection

@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#city').on('change', function() {
            const cityId = this.value
            const regionId = this.getAttribute('data-region');
             var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          
            axios.post(`/region/${regionId}`, 
            {
            regionId : this.value
          },{
            headers: {
            'Content-Type': 'application/json'
            }
          })
          .then(function (response) {
                console.log(response.data.region);
                document.getElementById('province').value = response.data.region;
          })
          .catch(function (error) {
            console.log(error);
          }); 
    });
    })
    
        
  </script>
@endsection
  