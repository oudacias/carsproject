<link rel="stylesheet" type="text/css" href="/css/pdf.css">

<h1 style="text-align:center">Diagnostic Voiture</h2>

<table style="font-size:22px">
<tr>
    <td class="width_column">Nom Client</td>
    <td>:{{$diagnostic->user->nom}}</td>
</tr>
<tr>
    <td class="width_column">Prénom Client</td>
    <td>:{{$diagnostic->user->prenom}}</td>
</tr>
<tr>
    <td class="width_column">Email Client</td>
    <td>:{{$diagnostic->user->email}}</td>
</tr>
<tr>
    <td class="width_column">Téléphone Client</td>
    <td>:{{$diagnostic->user->telephone}}</td>
</tr>

<tr>
    <td class="width_column">Marque</td>
    <td>:{{$diagnostic->marque}}</td>
</tr>
<tr>
    <td class="width_column">Model</td>
    <td>:{{$diagnostic->model}}</td>
</tr>

<tr>
    <td class="width_column">Version</td>
    <td>:{{$diagnostic->version}}</td>
</tr>
<tr>
    <td class="width_column">Carburant</td>
    <td>:{{$diagnostic->carburant}}</td>
</tr>
<tr>
    <td class="width_column">Boite Vitesse</td>
    <td>:{{$diagnostic->boite_vitesse}}</td>
</tr>
<tr>
    <td class="width_column">Anneée</td>
    <td>:{{$diagnostic->annee}}</td>
</tr>
<tr>
    <td class="width_column">Dédouané</td>
    <td>:{{$diagnostic->dedouane}}</td>
</tr>
<tr>
    <td class="width_column">Kilométrage</td>
    <td>:{{$diagnostic->kilometrage}}</td>
</tr>
<tr>
    <td class="width_column">Couleur</td>
    <td>:{{$diagnostic->couleur}}</td>
</tr>
<tr>
    <td class="width_column">Carosserie</td>
    <td>:{{$diagnostic->carrosserie}}</td>
</tr>
<tr>
    <td class="width_column">Nombre Porte</td>
    <td>:{{$diagnostic->nbr_porte}}</td>
</tr>
<tr>
    <td class="width_column">Puissance Fiscale</td>
    <td>:{{$diagnostic->puissance_fiscale}}</td>
</tr>
<tr>
    <td class="width_column">Première Main</td>
    <td>:{{$diagnostic->premiere_main}}</td>
</tr>
<tr>
    <td class="width_column">Préparé</td>
    <td>:{{$diagnostic->prepare}}</td>
</tr>
<tr>
    
</table>



<img class="img-car" src="{{ public_path() . $diagnostic->photo }}">
<h2 style="text-align:center">Photo Voiture</h2>

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
        width:70%;
        height:auto;
        margin-left:75px;
    }
    
</style>
