<?php
namespace RD\Providers;
     
use IO\Helper\TemplateContainer;
use IO\Helper\ComponentContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
 
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
    	 * Boot a template.
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