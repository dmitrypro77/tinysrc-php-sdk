<?php

namespace Tinysrc;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiResponse.
 */
class ApiResponse
{
    /**
     * @var string
     */
    private $body;

    private $data;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var array
     */
    private $validations = [];

    /**
     * @var int
     */
    private $status;

    /**
     * ApiResponse constructor.
     * @param ResponseInterface $response
     * @param string $className
     */
    public function __construct(ResponseInterface $response, string $className = '')
    {
        $this->status = $response->getStatusCode();
        $serializer = SerializerBuilder::create()->build();

        if (
            $response->hasHeader('Content-type') &&
            false !== strpos(implode(',', $response->getHeader('Content-type')), 'json')
        ) {
            $this->body = (string) $response->getBody()->getContents();
        } else {
            $this->body = (string) $response->getBody();
        }

        if ($this->status === 401) {
            $this->errors[] = [
                'code' => "key",
                'message' => "Invalid Api Key",
            ];
        } elseif ($this->status > 299) {
            $decodeBody = json_decode($this->body, true);

            if (isset($decodeBody['validations'])) {
                $this->validations = $decodeBody['validations'];
            }

            if (isset($decodeBody['errors'])) {
                $this->errors = $decodeBody['errors'];
            }
        }

        if ($this->isSuccess() && !empty($className)) {
            $this->data = $serializer->deserialize($this->body, $className, 'json', DeserializationContext::create()->setVersion(Constants::CURRENT_VERSION));
        }
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->status >= 200 && $this->status <= 299;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errors) > 0 || count($this->validations) > 0;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getValidations(): array
    {
        return $this->validations;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
