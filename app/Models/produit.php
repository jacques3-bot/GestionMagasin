<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
   protected $fillable = [
    'id_user',
    'nom',
    'quantitee',
    'prix_unitaire',
    'description',
    'entree_sortir',
    'etat'
   ];
}
