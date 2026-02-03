<?php

namespace JeffersonGoncalves\FilamentSatis\Actions;

class SanitizeSatisPackages
{
    public function execute(string $output): string
    {
        $lines = explode("\n", $output);
        $sanitized = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if (empty($trimmed)) {
                continue;
            }

            // Remove ANSI escape codes
            $trimmed = preg_replace('/\e\[[0-9;]*m/', '', $trimmed);

            $sanitized[] = $trimmed;
        }

        return implode("\n", $sanitized);
    }
}
