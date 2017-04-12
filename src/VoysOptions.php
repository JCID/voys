<?php

namespace Jcid\Voys;

/**
 * This class contains a list of built-in Voys request options.
 *
 * More documentation for each option can be found at https://help.voys.nl/index.php/Klik_en_bel
 */
final class VoysOptions
{
    /**
     * optional, the number side A sees on the incoming call
     * must be one of these values: 'a_number', 'b_number' or 'suppressed'.
     */
    const A_CLI = 'a_cli';

    /**
     * optional, the number side B sees on the incoming call
     * must be a number you own.
     */
    const B_CLI = 'b_cli';

    /**
     * optional, the number side A sees on the incoming call.
     */
    const A_NUMBER = 'a_number';

    /**
     * required, number or extension to dial.
     */
    const B_NUMBER = 'b_number';

    /**
     * optional, whether or not to answer the incoming call to your own phone automatically
     * must be true or false - if not provided it will use the user's preference.
     */
    const AUTO_ANSWER = 'auto_answer';
}
