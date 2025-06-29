<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport\Smtp;

use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
final class EsmtpTransportFactory extends AbstractTransportFactory
{
    public function create(Dsn $dsn): TransportInterface
    {
        $tls = 'smtps' === $dsn->getScheme() ? true : null;
        $port = $dsn->getPort(0);
        $host = $dsn->getHost();

        $transport = new EsmtpTransport($host, $port, $tls, $this->dispatcher, $this->logger);

<<<<<<< HEAD
        if ('' !== $dsn->getOption('verify_peer') && !filter_var($dsn->getOption('verify_peer', true), \FILTER_VALIDATE_BOOLEAN)) {
            /** @var SocketStream $stream */
            $stream = $transport->getStream();
            $streamOptions = $stream->getStreamOptions();

            $streamOptions['ssl']['verify_peer'] = false;
            $streamOptions['ssl']['verify_peer_name'] = false;

            $stream->setStreamOptions($streamOptions);
        }

=======
        /** @var SocketStream $stream */
        $stream = $transport->getStream();
        $streamOptions = $stream->getStreamOptions();

        if ('' !== $dsn->getOption('verify_peer') && !filter_var($dsn->getOption('verify_peer', true), \FILTER_VALIDATE_BOOL)) {
            $streamOptions['ssl']['verify_peer'] = false;
            $streamOptions['ssl']['verify_peer_name'] = false;
        }

        if (null !== $peerFingerprint = $dsn->getOption('peer_fingerprint')) {
            $streamOptions['ssl']['peer_fingerprint'] = $peerFingerprint;
        }

        $stream->setStreamOptions($streamOptions);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if ($user = $dsn->getUser()) {
            $transport->setUsername($user);
        }

        if ($password = $dsn->getPassword()) {
            $transport->setPassword($password);
        }

        if (null !== ($localDomain = $dsn->getOption('local_domain'))) {
            $transport->setLocalDomain($localDomain);
        }

<<<<<<< HEAD
=======
        if (null !== ($maxPerSecond = $dsn->getOption('max_per_second'))) {
            $transport->setMaxPerSecond((float) $maxPerSecond);
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if (null !== ($restartThreshold = $dsn->getOption('restart_threshold'))) {
            $transport->setRestartThreshold((int) $restartThreshold, (int) $dsn->getOption('restart_threshold_sleep', 0));
        }

        if (null !== ($pingThreshold = $dsn->getOption('ping_threshold'))) {
            $transport->setPingThreshold((int) $pingThreshold);
        }

        return $transport;
    }

    protected function getSupportedSchemes(): array
    {
        return ['smtp', 'smtps'];
    }
}
