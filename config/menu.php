<?php

return [
    'client' => [
        [
            'label' => 'Beranda',
            'url' => 'home',
        ],
        [
            'label' => 'Klub',
            'url' => 'club',
        ],
        [
            'label' => 'Tim',
            'url' => 'team',
        ],
        [
            'label' => 'Pertandingan',
            'url' => 'matches',
        ],
        [
            'label' => 'Media',
            'url' => 'media',
            'query' => 'tab=all'
        ],

        // 'Klub' => [
        //     ['label' => 'Profil Klub', 'url' => '/klub/profil'],
        //     ['label' => 'Manajemen', 'url' => '/klub/manajemen'],
        //     ['label' => 'Visi & Misi', 'url' => '/klub/visi-misi'],
        // ],
        // 'Tim' => [
        //     ['label' => 'Profil Pemain', 'url' => '/tim/pemain'],
        //     ['label' => 'Profil Pelatih', 'url' => '/tim/pelatih'],
        // ],
        // 'Pertandingan' => [
        //     ['label' => 'Jadwal', 'url' => '/pertandingan/jadwal'],
        //     ['label' => 'Hasil', 'url' => '/pertandingan/hasil'],
        //     ['label' => 'Klasemen', 'url' => '/pertandingan/klasemen'],
        //     ['label' => 'Statistik', 'url' => '/pertandingan/statistik'],
        // ],
        // 'Media' => [
        //     ['label' => 'Berita & Update', 'url' => '/media/berita'],
        //     ['label' => 'Galeri Foto', 'url' => '/media/galeri'],
        //     ['label' => 'Highlight', 'url' => '/media/highlight'],
        // ],
        // 'Tiket' => [
        //     ['label' => 'Penjualan Tiket Pertandingan', 'url' => '/tiket/penjualan'],
        // ],
    ],

    'admin' => [
        'Dashboard' => '/admin/dashboard',
        'Manajemen Klub' => [
            ['label' => 'Edit Profil', 'url' => '/admin/klub/edit'],
            ['label' => 'Struktur Organisasi', 'url' => '/admin/klub/struktur'],
        ],
        'Manajemen Tim' => [
            ['label' => 'Data Pemain', 'url' => '/admin/tim/pemain'],
            ['label' => 'Data Pelatih', 'url' => '/admin/tim/pelatih'],
        ],
        'Pertandingan' => [
            ['label' => 'Input Jadwal', 'url' => '/admin/pertandingan/jadwal'],
            ['label' => 'Input Hasil', 'url' => '/admin/pertandingan/hasil'],
        ],
        'Media' => [
            ['label' => 'Upload Berita', 'url' => '/admin/media/berita'],
            ['label' => 'Upload Foto', 'url' => '/admin/media/galeri'],
        ],
        'Logout' => '/admin/logout',
    ],
];
