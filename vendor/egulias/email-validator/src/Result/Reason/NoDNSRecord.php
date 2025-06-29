<?php

namespace Egulias\EmailValidator\Result\Reason;

class NoDNSRecord implements Reason 
{
    public function code() : int
    {
        return 5;
    }

    public function description() : string
    {
<<<<<<< HEAD
        return 'No MX or A DSN record was found for this email';
=======
        return 'No MX or A DNS record was found for this email';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
