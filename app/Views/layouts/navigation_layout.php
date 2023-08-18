<?php
    echo view('components/header', ['page_title' => $title]);
    echo view('components/submenu');
    echo view($subview);
    echo view('components/footer');