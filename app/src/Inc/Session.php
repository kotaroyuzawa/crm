<?php

namespace App\Inc;

class Session {

    public function __construct()
    {
        if (session_start() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key): mixed
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public function delete(string $key): void
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear(): void
    {
        session_unset();
    }

    public function destroy(): void
    {
        session_destroy();
    }

    private function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
}
