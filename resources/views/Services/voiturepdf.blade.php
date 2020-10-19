<link rel="stylesheet" type="text/css" href="/css/pdf.css">
@php $path = "/project_images/logoCars.png" @endphp
<img class="logo-car" src="{{ public_path() .  $path}}">
<div class="brand-car">ELAMDASSI ON CARS</div>

<h1 style="text-align:center">Vente Voiture</h2>

<table style="font-size:22px">
<tr>
    <td class="width_column">Nom Client</td>
    <td>:{{$voiture->user->nom}}</td>
</tr>
<tr>
    <td class="width_column">Prénom Client</td>
    <td>:{{$voiture->user->prenom}}</td>
</tr>
<tr>
    <td class="width_column">Téléphone Client</td>
    <td>:{{$voiture->user->telephone}}</td>
</tr>
<tr>
    <td class="width_column">Version</td>
    <td>:{{$voiture->version}}</td>
</tr>
<tr>
    <td class="width_column">Carburant</td>
    <td>:{{$voiture->carburant}}</td>
</tr>
<tr>
    <td class="width_column">Boite de Vitesse</td>
    <td>:{{$voiture->boite_vitesse}}</td>
</tr>
<tr>
    <td class="width_column">Année</td>
    <td>:{{$voiture->annee}}</td>
</tr>
<tr>
    <td class="width_column">Origine</td>
    <td>:{{$voiture->origine}}</td>
</tr>
<tr>
    <td class="width_column">Kilomètre parcourus</td>
    <td>:{{$voiture->kilometrage}}</td>
</tr>
<tr>
    <td class="width_column">Carrosserie</td>
    <td>:{{$voiture->carrosserie}}</td>
</tr>

<tr>
    <td class="width_column">Nombre Portes</td>
    <td>:{{$voiture->nbr_porte}}</td>
</tr>
<tr>
    <td class="width_column">Puissance Fiscale</td>
    <td>:{{$voiture->puissance_fiscale}}</td>
</tr>
<tr>
    <td class="width_column">Premiere Main</td>
    <td>:{{$voiture->premiere_main}}</td>
</tr>
<tr>
    <td class="width_column">Préparé</td>
    <td>:{{$voiture->prepare}}</td>
</tr>
<tr>
    <td class="width_column">Description</td>
    <td>:{{$voiture->description}}</td>
</tr>
<tr>
    <td class="width_column">Prix</td>
    <td>:{{$voiture->prix}}</td>
</tr>
<tr>
    <td class="width_column">Options Voiture</td>
    <td>:{{$voiture->options}}</td>
</tr>
<tr>
    <td class="width_column">Ville Voiture</td>
    <td>:{{$voiture->ville}}</td>
</tr>
<tr>
    <td class="width_column">Type Voiture</td>
    @if(!$voiture->voitureoccasion)
    <td>:Neuve</td>
    @else
    <td>:Occasion</td>
</tr>
<tr>
    <td class="width_column">Etat Voiture</td>
    <td>:{{$voiture->voitureoccasion->etat}}</td>
</tr>
@endif 
</table>
<img class="img-car" src="{{ public_path() . $voiture->photo }}">
@if($voiture->voitureimage)
@foreach($voiture->voitureimage as $v)
    <img class="img-car" src="{{ public_path() . $v->image1 }}">
    @if($v->image2)
        <img class="img-car" src="{{ public_path() . $v->image2 }}">
    @endif
    @if($v->image3)
        <img class="img-car" src="{{ public_path() . $v->image3 }}">
    @endif
@endforeach
@endif

<style>

table{
    margin-left:200px;
    width: 700px;
    margin-top:50px;

    }
    .width_column{
        width:40%;
        padding-right:40px;
    }
    .img-car{
        margin-top: 50px;
        width:30%;
        height:auto;
        margin-left:95px;
    }
    .logo-car{
        width:20%;
    }
    .brand-car{
        color:#FAB107;
        font-size:30px;
        text-align:center;
    }

</style>

