<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
        \app\Note::class=>\app\policies\NotePolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        foreach ($this->getPermission() as $permission){

            $gate->define($permission->name,function($user) use ($permission){
                return $user->hasRoll($permission->rolls);

            });
        }
        
//        $gate->define('note-edit',function($user,$note){
//           return $user->owns($note);
//        });

    }

    public function getPermission()
    {
        return Permission::with('rolls')->get();
    }
}
