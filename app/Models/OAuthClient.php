<?php
namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class OAuthClient extends Model
{
    protected $table = 'oauth_clients';

    protected $fillable = [
        'secret',
        'name',
        'id'
    ];
}
