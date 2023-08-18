<?php
echo view('components/header', ['page_title' => $title]);
echo view('components/main-menu');
echo view($subview);
echo view('components/footer');