<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class Privilege extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
    public function resolveUser()
    {
        return Auth::user();
    }
    public function transformAudit(array $data): array
    {
        $data['user_email'] = Auth::user()->email;
        $data['user_type'] = Auth::user()->user_type;

        return $data;
    }

    public function permissions()
    {
        return $this->hasMany(PermissionDetail::class);
    }


}
