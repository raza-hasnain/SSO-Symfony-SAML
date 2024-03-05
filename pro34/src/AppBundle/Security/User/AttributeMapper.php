<?php
/**  Created for a tutorial, not fully tested  */

namespace AppBundle\Security\User;

use LightSaml\SpBundle\Security\Authentication\Token\SamlSpResponseToken;
use LightSaml\SpBundle\Security\User\AttributeMapperInterface;
use LightSaml\Model\Assertion\Assertion;
use LightSaml\Model\Assertion\AttributeStatement;
use LightSaml\Model\Protocol\Response;

class AttributeMapper implements  AttributeMapperInterface
{
    /**
     * @param SamlSpResponseToken $token
     *
     * @return array
     */
    public function getAttributes(SamlSpResponseToken $token)
    {
        $attributes = array();
        $response = $token->getResponse();
        $assertions = $response->getBearerAssertions();

        foreach($assertions as $assertion) {
            $assertionItems = $assertion->getAllItems();
            $attributesPartial = $this->getAttributesFromAssertionItems($assertionItems);
            $attributes = array_merge($attributes, $attributesPartial);

        }
		
        return $attributes;
    }

    /**
     * @param Response $response
     * @return array
     */
    public function getAttributesFromResponse(Response $response)
    {
        $attributes = array();
        $assertions = $response->getBearerAssertions();

        foreach($assertions as $assertion) {
            $assertionItems = $assertion->getAllItems();
            $attributesPartial = $this->getAttributesFromAssertionItems($assertionItems);
            $attributes = array_merge($attributes, $attributesPartial);

        }

        return $attributes;
    }

    /**
     * Receives an array of LightSaml\Model\Assertion\AttributeStatement
     * Returns an array of attributes
     *
     * @param array $assertionItems
     * @return array
     */
    protected function getAttributesFromAssertionItems(array $assertionItems)
    {
        $attributes = array();

        foreach ($assertionItems as $item) {
            if ($item instanceof AttributeStatement) {
                foreach ($item->getAllAttributes() as $itemAttr) {
                    if($itemAttr->getName() !== null) {
                        $attributes[$itemAttr->getName()] = $itemAttr->getAllAttributeValues();
                    }
                }
            }
        }

        return $attributes;
    }
}