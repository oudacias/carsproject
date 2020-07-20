<link rel="stylesheet" type="text/css" href="/css/pdf.css">
@php $path = "/project_images/logoCars.png" @endphp
<img class="logo-car" src="{{ public_path() .  $path}}">
<div class="brand-car">ELAMDASSI ON CARS</div>

<h1 style="text-align:center">Suivi Voiture</h2>

<table style="font-size:22px">
<tr>
    <td class="width_column">Nom Client</td>
    <td>:{{$suivi->nom}}</td>
</tr>
<tr>
    <td class="width_column">Prénom Client</td>
    <td>:{{$suivi->prenom}}</td>
</tr>
<tr>
    <td class="width_column">Téléphone Client</td>
    <td>:{{$suivi->telephone}}</td>
</tr>
<tr>
    <td class="width_column">Ville Client</td>
    <td>:{{$suivi->ville}}</td>
</tr>
<tr>
    <td class="width_column">Client</td>
    <td>:{{$suivi->sexe}}</td>
</tr>
<tr>
    <td class="width_column">Age Client</td>
    <td>:{{$suivi->age}}</td>
</tr>
<tr>
    <td class="width_column">Situation Familiale</td>
    <td>:{{$suivi->situation_familiale}}</td>
</tr>

<tr>
    <td class="width_column">Kilomètre parcourus</td>
    <td>:{{$suivi->km_parcouru}}</td>
</tr>
<tr>
    <td class="width_column">Type Route</td>
    <td>:{{$suivi->type_route}}</td>
</tr>

<tr>
    <td class="width_column">Place</td>
    <td>:{{$suivi->places}}</td>
</tr>
<tr>
    <td class="width_column">Espace Bagage</td>
    <td>:{{$suivi->bagages}}</td>
</tr>
<tr>
    <td class="width_column">Type Usage</td>
    <td>:{{$suivi->type_usage}}</td>
</tr>
<tr>
    <td class="width_column">Budget</td>
    <td>:{{$suivi->budget}}</td>
</tr>
<tr>
    <td class="width_column">Type Financement</td>
    <td>:{{$suivi->type_financement}}</td>
</tr>
<tr>
    <td class="width_column">Justification</td>
    <td>:{{$suivi->justification}}</td>
</tr>
<tr>
    <td class="width_column">Type Voiture</td>
    <td>:{{$suivi->type_voiture}}</td>
</tr>
<tr>
    <td class="width_column">Pourquoi Type Voiture</td>
    <td>:{{$suivi->pourquoi_type_voiture}}</td>
</tr>
<tr>
    <td class="width_column">Type Carburant</td>
    <td>:{{$suivi->type_carburant}}</td>
</tr>
<tr>
    <td class="width_column">Idée Crédit</td>
    <td>:{{$suivi->idee_crédit}}</td>
</tr>
<tr>
    <td class="width_column">Choix Voiture</td>
    <td>:{{$suivi->voiture_preference}}</td>
</tr>
<tr>
    <td class="width_column">Pourquoi Choix Voiture</td>
    <td>:{{$suivi->pourquoi_voiture_preference}}</td>
</tr>
  
</table>

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
