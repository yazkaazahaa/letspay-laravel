<?php

// Trik Codex: Memaksa pembuatan folder temporer secara real-time di serverless Vercel
$paths = [
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache'
];

foreach ($paths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// Override environment secara absolut agar tidak crash membaca data kosong
putenv("APP_ENV=production");
putenv("APP_DEBUG=true");
putenv("VIEW_COMPILED_PATH=/tmp/storage/framework/views");
putenv("CACHE_STORE=array");
putenv("SESSION_DRIVER=cookie");

// Jalankan file utama public Laravel
require __DIR__ . '/../public/index.php';
