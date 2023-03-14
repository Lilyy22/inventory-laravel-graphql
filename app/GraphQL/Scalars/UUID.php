<?php

namespace App\GraphQL\Scalars;

use GraphQL\Type\Definition\ScalarType;
use GraphQL\Utils\Utils;
use GraphQL\Error\InvariantViolation;
use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;

/**
 * Read more about scalars here https://webonyx.github.io/graphql-php/type-definitions/scalars
 */
final class UUID extends ScalarType
{

    private function validateUUID($value)
    {
        $pattern = "/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i";

        return preg_match($pattern, $value);
    }
    /**
     * Serializes an internal value to include in a response.
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function serialize($value)
    {
        if (!$this->validateUUID($value)) {
            throw new InvariantViolation("Could not serialize following value as UUID: " . Utils::printSafe($value));
        }

        // Assuming the internal representation of the value is always correct
        return $value;
    }

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function parseValue($value)
    {
        if (!$this->validateUUID($value)) {
            throw new InvariantViolation("Cannot represent following value as UUID: " . Utils::printSafe($value));
        }
        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * E.g.
     * {
     *   user(email: "user@example.com")
     * }
     *
     * @param  \GraphQL\Language\AST\Node  $valueNode
     * @param  array<string, mixed>|null  $variables
     * @return mixed
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
         // Throw GraphQL\Error\Error vs \UnexpectedValueException to locate the error in the query
         if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }

        if (!$this->validateUUID($valueNode->value)) {
            throw new Error("Not a valid UUID", [$valueNode]);
        }

        return $valueNode->value;
    }
}
