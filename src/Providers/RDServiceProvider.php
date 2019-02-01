<?php
namespace RD\Providers;
     
use Ceres\Caching\NavigationCacheSettings;
use Ceres\Caching\SideNavigationCacheSettings;
use IO\Services\ContentCaching\Services\Container;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Extensions\Functions\Partial;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ConfigRepository;






     
    class RDServiceProvider extends ServiceProvider
    {
      const PRIORITY = 0;
     
    	/**
    	 * Register the service provider.
    	 */
    	public function register()
    	{
     
    	}
     
        /**
    	 * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
    	 */
    	public function boot(Twig $twig, Dispatcher $eventDispatcher)
        {
            $eventDispatcher->listen('IO.Component.Import', function (ComponentContainer $container)
            {
                if ($container->getOriginComponentTemplate()=='Ceres::Item.Components.SingleItem.SingleItem_Details')
                {
                    $container->setNewComponentTemplate('RD::content.SingleItem_Details');
                }
            }, self::PRIORITY);
        }
    }