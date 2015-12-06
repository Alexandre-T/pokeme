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
use Symfony\Component\HttpFoundation\RequestStack;
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
    private $requestStack;

    /**
     * Listener.
     *
     * @var IpTraceableListener
     */
    private $ipTraceableListener;

    /**
     * IpTraceSubscriber constructor.
     *
     * @param IpTraceableListener $ipTraceableListener
     * @param RequestStack|null $requestStack
     */
    public function __construct(IpTraceableListener $ipTraceableListener, RequestStack $requestStack = null)
    {
        $this->ipTraceableListener = $ipTraceableListener;
        $this->requestStack = $requestStack;
    }

    /**
     * Set the ip by listening on core.request.
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->requestStack) {
            return;
        }
        $request = $this->requestStack->getCurrentRequest();

        if (null === $request) {
            return;
        }

        $ip = $request->getClientIp();

        if (null !== $ip) {
            $this->ipTraceableListener->setIpValue($ip);
        }
    }

    /**
     * Returns an array of event names this subscriber wants to listen to (onKernelRequest here).
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => 'onKernelRequest',
        );
    }
}
