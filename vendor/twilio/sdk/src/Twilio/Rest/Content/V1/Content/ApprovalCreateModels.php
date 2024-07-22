<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Content
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Content\V1\Content;

use Twilio\Values;
abstract class ApprovalCreateModels
{
    /**
     * @property string $name Name of the template.
     * @property string $category A WhatsApp recognized template category.
    */
    public static function createContentApprovalRequest(array $payload = []): ContentApprovalRequest
    {
        return new ContentApprovalRequest($payload);
    }

}

class ContentApprovalRequest implements \JsonSerializable
{
    /**
     * @property string $name Name of the template.
     * @property string $category A WhatsApp recognized template category.
    */
        protected $name;
        protected $category;
    public function __construct(array $payload = []) {
        $this->name = Values::array_get($payload, 'name');
        $this->category = Values::array_get($payload, 'category');
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'category' => $this->category
        ];
    }
}

