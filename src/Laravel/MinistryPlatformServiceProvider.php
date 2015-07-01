<?php namespace Blackpulp\MinistryPlatform\Laravel;

use \Illuminate\Support\ServiceProvider;

/**
 * The Laravel Service Provider
 *
 * Longer Description?
 * 
 * @author Ken Mulford <ken@blackpulp.com>
 * @category MinistryPlatform
 * @package  Blackpulp\MinistryPlatform
 * @version  1.0
 */

/**
 * The service provider allows Laravel to publish the config file,
 * and can be configured to allow the MP instance to be used
 * via dependency injection.
 */
class MinistryPlatformServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Register bindings in the container.
   *
   * @return void
   */

  public function boot() {

    $this->publishes([
      __DIR__.'/config/mp.php' => config_path('mp.php'),
    ]);

  }

  public function register() {

    $this->mergeConfigFrom(__DIR__.'/config/mp.php', 'mp');

  }

  public function _registerMinistryPlatform() {

    $this->app->bindShared(
      'Blackpulp\MinistryPlatform\MinistryPlatform',
      function($app) {
        return new MinistryPlatform (
                    $app->config->get('mp.wsdl'),
                    $app->config->get('mp.guid'),
                    $app->config->get('mp.password'),
                    $app->config->get('mp.name')
        );
      }
    );

  }

}