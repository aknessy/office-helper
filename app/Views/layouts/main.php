<?php
echo view('components/header', ['page_title' => $title, 'breadcrumbs' => $breadcrumbs, 'uri' => $uri]);
echo view('components/main-menu');
echo view($subview);
echo view('components/footer');