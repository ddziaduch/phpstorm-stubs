<?php


namespace http {

    /**
     * The HTTP client. See http\Client\Curl’s options which is the only driver currently supported.
     *
     * @see \http\Client\Curl
     * @see \http\Client\Curl::options()
     */
    class Client implements \Countable, \SplSubject {
        /**
         * @var string Debug callback’s $data contains human readable text.
         */
        public const DEBUG_INFO = '';

        /**
         * @var string Debug callback’s $data contains data received.
         */
        public const DEBUG_IN = '';

        /**
         * @var string Debug callback’s $data contains data sent.
         */
        public const DEBUG_OUT = '';

        /**
         * @var string Debug callback’s $data contains headers.
         */
        public const DEBUG_HEADER = '';

        /**
         * @var string Debug callback’s $data contains a body part.
         */
        public const DEBUG_BODY = '';

        /**
         * @var string Debug callback’s $data contains SSL data.
         */
        public const DEBUG_SSL = '';

        /**
         * @var \SplObjectStorage|null Attached observers.
         */
        private $observers = NULL;

        /**
         * @var array|null Set options.
         */
        protected $options = NULL;

        /**
         * @var \http\Message|null Request/response history.
         */
        protected $history = NULL;

        /**
         * @var bool Whether to record history in http\Client::$history.
         * @see \http\Client::$history
         */
        public $recordHistory = false;

        /**
         * Create a new HTTP client.
         * Currently only “curl” is supported as a $driver, and used by default.
         * Persisted resources identified by $persistent_handle_id will be re-used if available.
         *
         * @param string|null $driver The HTTP client driver to employ. Currently only the default driver, “curl”, is supported.
         * @param string|null $persistent_handle_id If supplied, created curl handles will be persisted with this identifier for later reuse.
         *
         * @throws \http\Exception\InvalidArgumentException
         * @throws \http\Exception\UnexpectedValueException
         * @throws \http\Exception\RuntimeException
         */
        public function __construct(string $driver = NULL, string $persistent_handle_id = NULL) {}

        /**
         * Add custom cookies.
         *
         * @see \http\Client::setCookies()
         *
         * @param array|null $cookies Custom cookies to add.
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         */
        public function addCookies(array $cookies = NULL): Client {}

        /**
         * Add specific SSL options.
         *
         * @see \http\Client::setSslOptions()
         * @see \http\Client::setOptions()
         * @see \http\Client\Curl\$ssl options
         *
         * @param array|null $ssl_options Add this SSL options.
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         */
        public function addSslOptions(array $ssl_options = NULL): Client {}

        /**
         * Implements SplSubject.
         * Attach another observer.
         * Attached observers will be notified with progress of each transfer.
         *
         * @see \SplSubject An implementation of \SplObserver.
         *
         * @param \SplObserver $observer
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         * @throws \http\Exception\UnexpectedValueException
         */
        public function attach(\SplObserver $observer): Client {}

        /**
         * Configure the client’s low level options.
         *
         * @since v2.3.0
         *
         * @see https://mdref.m6w6.name/http/Client/Curl#Configuration:
         *
         * @param array $configuration Key/value pairs of low level options.
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         * @throws \http\Exception\UnexpectedValueException
         *
         * @example https://mdref.m6w6.name/http/Client/configure#Example:
         */
        public function configure(array $configuration): Client {}

        /**
         * Implements \Countable. Retrieve the number of enqueued requests.
         *
         * NOTE:
         * The enqueued requests are counted without regard whether they are finished or not.
         *
         * @see \Countable
         *
         * @return int number of enqueued requests.
         */
        public function count(): int {}

        /**
         * Dequeue the \http\Client\Request $request.
         *
         * @see \http\Client::requeue() if you want to requeue the request, instead of \calling http\Client::dequeue() and then \http\Client::enqueue().
         *
         * @param Client\Request $request The request to cancel.
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         * @throws \http\Exception\BadMethodCallException
         * @throws \http\Exception\RuntimeException
         */
        public function dequeue(Client\Request $request): Client {}

        /**
         * Implements SplSubject.
         * Detach $observer, which has been previously attached.
         *
         * @see \SplSubject
         *
         * @param \SplObserver $observer Previously attached instance of SplObserver implementation.
         *
         * @return Client self
         *
         * @throws \http\Exception\InvalidArgumentException
         * @throws \http\Exception\UnexpectedValueException
         */
        public function detach(\SplObserver $observer): Client {}
    }
}