<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/15
 * Time: 23:29
 */

namespace cdcchen\wework\base;

/**
 * Class AttributeArray
 * @package cdcchen\wework\base
 */
class AttributeArray implements \Countable, \JsonSerializable, \Serializable, \ArrayAccess
{
    /**
     * @var array
     */
    protected $container = [];

    /**
     * AttributeArray constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->container = $attributes;
        $this->init();
    }

    /**
     * init after construct
     */
    protected function init()
    {
    }

    /**
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value): void
    {
        $this->container[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->container[$key] ?? null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->container[$key]);
    }

    /**
     * @param string $key
     * @param $value
     */
    public function append(string $key, $value)
    {
        $existedValue = $this->container[$key] ?? null;
        if ($existedValue === null) {
            $this->container[$key] = $value;
        } elseif (is_array($existedValue)) {
            $this->container[$key][] = $value;
        } else {
            $this->container[$key] = [$this->container[$key], $value];
        }
    }

    /**
     * @param string $key
     */
    public function remove(string $key)
    {
        unset($this->container[$key]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->container);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->container);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return static::_toArray($this->container);
    }

    private static function _toArray($data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = static::_toArray($value);
            } elseif (method_exists($value, 'toArray')) {
                $data[$key] = $value->toArray();
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        if (is_string($offset)) {
            return isset($this->container[$offset]);
        }

        throw new \InvalidArgumentException('offset must be a string.');
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (is_string($offset)) {
            return $this->container[$offset];
        }

        throw new \InvalidArgumentException('offset must be a string.');
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_string($offset)) {
            $this->container[$offset] = $value;
        }

        throw new \InvalidArgumentException('offset must be a string.');
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if (is_string($offset)) {
            unset($this->container[$offset]);
        }

        throw new \InvalidArgumentException('offset must be a string.');
    }

    /**
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this->container);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $this->container = unserialize($serialized);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->container;
    }

    /**
     * @return string
     */
    public function jsonEncode(): string
    {
        return json_encode($this->container, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return string
     */
    public function urlEncode(): string
    {
        return http_build_query($this->container);
    }
}
