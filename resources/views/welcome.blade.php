<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex flex-col items-center gap-6 max-w-[335px] w-full">
                <svg 
                    class="w-24 h-24 lg:w-32 lg:h-32 mx-auto"
                    id="payment_method_business_payment_money_cash_finance_transfer_credit_card_wallet_transaction_debit"
                    viewBox="0 0 32 32"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="m16 30h-6c-1.65 0-3-1.35-3-3v-8h6v8c0 1.65 1.35 3 3 3z" fill="#90caf9"/>
                    <path d="m11 19h-6c-1.1 0-2-.9-2-2v-12c0-1.1.9-2 2-2h6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2z" fill="#90caf9"/><g fill="#1565c0">
                    <path d="m28 15.11v-10.3c0-1.55-1.26-2.81-2.81-2.81h-20.38c-1.55 0-2.81 1.26-2.81 2.81v12.38c0 1.55 1.26 2.81 2.81 2.81h2.19v7.27c0 1.51 1.22 2.73 2.73 2.73h17.54c1.51 0 2.73-1.22 2.73-2.73v-9.54c0-1.25-.85-2.3-2-2.62zm-24-10.3c0-.45.36-.81.81-.81h20.38c.45 0 .81.36.81.81v1.19h-22zm.81 13.19c-.45 0-.81-.36-.81-.81v-9.19h22v9.19c0 .45-.36.81-.81.81zm15.11 4.54c0 1.19-.66 2.23-1.42 2.23s-1.42-1.04-1.42-2.23.66-2.23 1.42-2.23 1.42 1.04 1.42 2.23zm-10.19 5.46c-.4 0-.73-.33-.73-.73v-1.13c.87.31 1.55.99 1.86 1.86zm18.27-.73c0 .4-.33.73-.73.73h-1.13c.31-.87.99-1.55 1.86-1.86zm0-3.21c-1.98.4-3.54 1.96-3.94 3.94h-11.12c-.4-1.98-1.96-3.54-3.94-3.94v-3.05c.77-.15 1.48-.51 2.1-1.01h4.68c-.44.71-.7 1.58-.7 2.54 0 2.33 1.53 4.23 3.42 4.23s3.42-1.9 3.42-4.23c0-.96-.26-1.83-.7-2.54 4.43 0 4.12.02 4.57-.07.64.54 1.4.92 2.21 1.09zm0-5.13c-.16-.06-.31-.13-.46-.21.23-.35.37-.74.42-1.17.05.19.04-.04.04 1.38z"/>
                    <path d="m10.38 16h-3.69c-1.32 0-1.32-2 0-2h3.69c1.33 0 1.33 2 0 2z"/>
                    <path d="m6.69 12h16.62c1.32 0 1.32-2 0-2h-16.62c-1.32 0-1.32 2 0 2z"/></g>
                </svg>
                
                <p class="text-center text-base text-[#1b1b18] dark:text-[#EDEDEC]">
                    Bem-vindo ao Gestor de Despesas! Faça login ou registre-se para começar.
                </p>

                <div class="w-full flex justify-center">
                    @if (Route::has('login'))
                        <nav class="flex gap-4">
                            @auth
                                <a
                                    href="{{ url('/PainelDeControle') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                >
                                    Painel de Controle
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
