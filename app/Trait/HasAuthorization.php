<?Php

namespace App\Trait;

trait HasAuthorization
{

   /**
    * Create a single or array of permission to pivot
    *
    * @return 
    */
   public function givePermission($permission)
   {
      return $this->permissions()->attach($permission);
   }

   /**
    * Create a single or array of role to pivot
    *
    * @return  
    */
   public function giveRole($role)
   {
      return $this->roles()->attach($role);
   }

   /**
    * delete a single or array of permissions from pivot
    *
    * @return 
    */
   public function removePermission($permission)
   {
      return $this->permissions()->detach($permission);
   }

   /**
    * delete a single or array of role from pivot
    *
    * @return 
    */
   public function removeRole($role)
   {
      return $this->roles()->detach($role);
   }

   /**
    * check if user has permission 
    *
    * @return bool
    */
   public function hasPermissionTo($permission)
   {
      return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);

   }

   /**
    * check role or user has permission
    *
    * @return bool
    */
   public function hasPermission($permission)
   {
      return (bool) $this->permissions()->where('slug', $permission)->count();
   }

   /**
    * check if user has permissions through role
    *
    * @return bool
    */
   public function hasPermissionThroughRole($permission)
   {
      foreach($this->roles() as $role)
      {
         return (bool) $role->permissions()->contain($permission)->count();
      }
         return false;
   }

   /**
    * check if user has role
    *
    * @return bool
    */
   public function hasRole($role)
   {
      return (bool) $this->roles()->where('slug', $role->slug)->count();
   }

   
}