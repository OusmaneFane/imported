<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Utilisateur extends Model implements Authenticatable
{

    use HasFactory;
    use \Illuminate\Auth\Authenticatable;
    protected $fillable = ['email', 'mot_de_passe', 'name', 'password_confirm'];
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

}
