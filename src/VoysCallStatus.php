<?php

namespace Jcid\Voys;

class VoysCallStatus
{
    /**
     * dit is soms mogelijk als het gesprek nog opgezet moet worden (de klik&bel API is asynchroon).
     */
    const STATUS_NULL = 'null';

    /**
     * het platform maakt verbinding met de eindbestemming van de gebruiker.
     */
    const DIALING_A = 'dialing_a';

    /**
     * het platform maakt verbinding met het gekozen nummer.
     */
    const DIALING_B = 'dialing_b';

    /**
     * het gesprek is tot stand gebracht.
     */
    const CONNECTED = 'connected';

    /**
     * het gesprek is afgebroken.
     */
    const DISCONNECTED = 'disconnected';

    /**
     * er kon geen verbinding worden opgezet met de eindbestemming van de gebruiker.
     */
    const FAILING_A = 'failing_a';

    /**
     * er kon geen verbinding worden opgezet met het gekozen nummer.
     */
    const FAILING_B = 'failing_b';
}
