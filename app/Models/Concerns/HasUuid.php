<?php

namespace App\Models\Concerns;

use Webpatser\Uuid\Uuid;

trait HasUuid
{
    /**
     * Uuid models are no longer capable to auto-increment index
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Generate a new random UUID and use if as primary key
     * when creating a new model.
     */
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = $model->getUuid();
            }
        });
    }

    public function getUuid()
    {
        return (string) Uuid::generate(
            $this->getUuidVersion(),
            $this->getUuidNode(),
            $this->getUuidNamespace()
        );
    }

    public function getUuidVersion()
    {
        return $this->uuidVersion ?? 4;
    }

    public function getUuidNamespace()
    {
        if (!isset($this->uuidNamespace)) {
            $key = config('app.key');

            if (0 === strpos($key, 'base64:')) {
                $key = bin2hex(base64_decode(substr($key, 7)));
            } else {
                $key = self::strToHex($key);
            }

            // Webpatser/UUID demands a 16 bytes namespace
            // which is *slightly* unsafe because Laravel
            // generates 32 bytes keys...
            $key = substr($key, 32);

            return $key;
        }

        if (0 === strpos($this->uuidNamespace, ':')) {
            return $this->{substr($this->uuidNamespace, 1)};
        }

        return $this->uuidNamespace;
    }

    public function getUuidNode()
    {
        if (!isset($this->uuidNode)) {
            return null;
        }

        if (0 === strpos($this->uuidNode, ':')) {
            return $this->{substr($this->uuidNode, 1)};
        }

        return $this->uuidNode;
    }

    protected static function strToHex(string $string): string
    {
        for ($i = 0, $hex = ''; $i < strlen($string); $i++) {
            $hex .= substr('0'.dechex(ord($string[$i])), -2);
        }

        return strtoupper($hex);
    }
}
