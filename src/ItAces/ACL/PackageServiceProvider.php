<?php
namespace VVK\ACL;

use Doctrine\ORM\EntityManagerInterface;
use VVK\ServiceProvider;

/**
 *
 * @author Vitaliy Kovalenko vvk@kola.cloud
 *
 */
class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * 
     * @param \Doctrine\ORM\EntityManagerInterface $manager
     * @return void
     */
    public function boot(EntityManagerInterface $manager)
    {
        $this->publishes([
            __DIR__.'/../../../app/Model' => app_path('Model'),
        ], 'itaces-model');
        
        $this->bootModel(
            $manager,
            [
                base_path('vendor/vvk/laravel-doctrine-acl/src/VVK/ACL/Entities') => 'VVK\ACL\Entities'
            ],
            'VVK\ACL\Entities'
        );
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
