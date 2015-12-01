<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category EventListener
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Request;
use Gedmo\IpTraceable\IpTraceableListener;

/**
 * Ip Trace Subscriber.
 *
 * @category IpTraceSubscriber
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class IpTraceSubscriber implements EventSubscriberInterface
{
    /**
     * Request.
     *
     * @var Request
     */
    private $request;

    /**
     * Listener.
     *
     * @var IpTraceableListener
     */
    private $ipTraceableListener;

    public function __construct(IpTraceableListener $ipTraceableListener, Request $request = null)
    {
        $this->ipTraceableListener = $ipTraceableListener;
        $this->request = $request;
    }

    /**
     * Set the username from the security context by listening on core.request.
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->request) {
            return;
        }

        // If you use a cache like Varnish, you may want to set a proxy to Request::getClientIp() method
        // $this->request->setTrustedProxies(array('127.0.0.1'));

        // $ip = $_SERVER['REMOTE_ADDR'];
        $ip = $this->request->getClientIp();

        if (null !== $ip) {
            $this->ipTraceableListener->setIpValue($ip);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => 'onKernelRequest',
        );
    }
}
