<?php

require_once __DIR__.'/vendor/autoload.php';

use function Termwind\render;

render(<<<'HTML'
<<<<<<< HEAD
    <div class="mx-2 my-1">
        <div class="flex space-x-1">
            <span class="flex-1 truncate">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt illo et nisi omnis porro at, mollitia harum quas esse, aperiam dolorem ab recusandae fugiat nesciunt doloribus rem eaque nostrum itaque.</span>
            <span class="text-green">DONE</span>
        </div>
=======
    <div class="ml-2">
        <pre>
  ─                   ─        ─    ─
│ │                 │ │      │ │  │ │
│ │     ──,         │ │  ──, │ │  │ │  ─
│/ \   /  │  │   │  │/  /  │ │/ \─│/  │/
│   │─/\─/│─/ \─/│─/│──/\─/│─/\─/ │──/│──/
        </pre>
        <div class="px-1 bg-green-300 text-black">by ⚙️ Configured</div>
        <div class="px-1 mt-1 bg-blue-300 text-black">{{ $version }}</div>
        <em class="ml-1">
            Create portable PHP CLI applications w/ PHP Micro
        </em>
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    </div>
HTML);
