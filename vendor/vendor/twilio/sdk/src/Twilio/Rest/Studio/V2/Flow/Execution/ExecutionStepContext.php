<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Studio\V2\Flow\Execution;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStep\ExecutionStepContextList;


/**
 * @property ExecutionStepContextList $stepContext
 * @method \Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStep\ExecutionStepContextContext stepContext()
 */
class ExecutionStepContext extends InstanceContext
    {
    protected $_stepContext;

    /**
     * Initialize the ExecutionStepContext
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow with the Step to fetch.
     * @param string $executionSid The SID of the Execution resource with the Step to fetch.
     * @param string $sid The SID of the ExecutionStep resource to fetch.
     */
    public function __construct(
        Version $version,
        $flowSid,
        $executionSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'flowSid' =>
            $flowSid,
        'executionSid' =>
            $executionSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Flows/' . \rawurlencode($flowSid)
        .'/Executions/' . \rawurlencode($executionSid)
        .'/Steps/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Fetch the ExecutionStepInstance
     *
     * @return ExecutionStepInstance Fetched ExecutionStepInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ExecutionStepInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new ExecutionStepInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['executionSid'],
            $this->solution['sid']
        );
    }


    /**
     * Access the stepContext
     */
    protected function getStepContext(): ExecutionStepContextList
    {
        if (!$this->_stepContext) {
            $this->_stepContext = new ExecutionStepContextList(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['executionSid'],
                $this->solution['sid']
            );
        }

        return $this->_stepContext;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V2.ExecutionStepContext ' . \implode(' ', $context) . ']';
    }
}
