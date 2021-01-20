@component('mail::message')
 # commande reçue merci   
 **Commande N°:** {{$order->id}}<br>
 **Commande Email:** {{$order->billing_email}}<br>
 **Commande Nom:** {{$order->billing_name}}<br>
 **Commande Total:** {{round($order->billing_total/100,2)}}  .DHS<br>

**Les articles commandés**<br>
@foreach ($order->products as $product)
Nom : {{$product->name}}<br>
Prix :{{round($product->price/100,2)}}. DHS<br>
Couleur: {{$product->pivot->color}}<br>
<img src="{{productImage($product->image)}}" alt="image Produit" width="100" height="100">
@endforeach


Vous pouvez obtenir plus de détails sur votre commande en vous connectant à notre site Web.

@component('mail::button',['url'=>config('app.url'),'color'=>'green'])
Go to website    
@endcomponent

Merci encore de nous avoir choisis.

Regards,<br>
{{config('app.name')}}

@endcomponent