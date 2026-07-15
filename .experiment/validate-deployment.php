<?php

declare(strict_types=1);

$faultFile = __DIR__ . '/fault-stage';

if (! is_file($faultFile)) {
    fwrite(STDERR, "File fault-stage tidak ditemukan.\n");
    exit(2);
}

$faultStage = trim((string) file_get_contents($faultFile));
$allowedStages = ['none', 'build', 'testing', 'deployment'];

if (! in_array($faultStage, $allowedStages, true)) {
    fwrite(STDERR, "Nilai fault-stage tidak valid: {$faultStage}\n");
    exit(2);
}

if ($faultStage === 'deployment') {
    fwrite(
        STDERR,
        "Validasi deployment gagal secara terkontrol untuk eksperimen.\n"
    );

    exit(1);
}

fwrite(
    STDOUT,
    "Validasi deployment berhasil. Fault stage: {$faultStage}\n"
);

exit(0);
