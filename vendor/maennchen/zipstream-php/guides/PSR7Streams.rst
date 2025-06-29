Usage with PSR 7 Streams
===============

PSR-7 streams are `standardized streams <https://www.php-fig.org/psr/psr-7/>`_.

ZipStream-PHP supports working with these streams with the function
``addFileFromPsr7Stream``. 

For all parameters of the function see the API documentation.

Example
---------------

.. code-block:: php
<<<<<<< HEAD
    
    $stream = $response->getBody();
    // add a file named 'streamfile.txt' from the content of the stream
    $zip->addFileFromPsr7Stream('streamfile.txt', $stream);
=======

    $stream = $response->getBody();
    // add a file named 'streamfile.txt' from the content of the stream
    $zip->addFileFromPsr7Stream(
        fileName: 'streamfile.txt',
        stream: $stream,
    );
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
