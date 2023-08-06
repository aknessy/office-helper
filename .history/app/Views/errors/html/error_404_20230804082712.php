<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=  ?></title>

    <style>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }
        body {
            height: 100%;
            background: #fafafa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
        }
        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }
        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #fff;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }
        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }
        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }
        p {
            margin-top: 1.5rem;
        }
        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }
        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }
    </style>
</head>
<body>
    <?php 
    echo view('components/header', ['page_title' => lang('Errors.pageNotFound'), 'uri' => $ur]);
    echo view('components/main-menu');
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-indigo-600">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                <code><?=(ENVIRONMENT != 'production' ? nl2br(esc($message)) : lang('Errors.sorryCannotFind'))?></code>
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="<?=base_url()?>" class="w-full rounded-md bg-blue-100 hover:bg-blue-200 px-3.5 py-2.5 text-sm font-semibold text-gray-400 hover:text-gray-600 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-300">Go back home</a>
                <!-- <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a> -->
            </div>
        </div>
    </main>
</body>
</html>
