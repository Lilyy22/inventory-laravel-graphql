<?Php

namespace App\Trait;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Auth\Role;
use App\Models\Auth\Permission;

trait HasAuthorization
{

    // public function hasPermission($permission)
    // {
    //    return (bool) $this->permissions->where('slug', $permission->slug)->count();
    // }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}