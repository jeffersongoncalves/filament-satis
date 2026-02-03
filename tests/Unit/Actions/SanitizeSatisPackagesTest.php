<?php

use JeffersonGoncalves\FilamentSatis\Actions\SanitizeSatisPackages;

it('removes empty lines', function () {
    $action = new SanitizeSatisPackages;
    $output = "line1\n\n\nline2\n";

    $result = $action->execute($output);

    expect($result)->toBe("line1\nline2");
});

it('removes ANSI escape codes', function () {
    $action = new SanitizeSatisPackages;
    $output = "\e[32mSuccess\e[0m\n\e[31mError\e[0m";

    $result = $action->execute($output);

    expect($result)->toBe("Success\nError");
});

it('trims whitespace', function () {
    $action = new SanitizeSatisPackages;
    $output = "  line1  \n  line2  ";

    $result = $action->execute($output);

    expect($result)->toBe("line1\nline2");
});
