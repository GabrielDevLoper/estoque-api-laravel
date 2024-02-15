@extends('layouts.master-without-nav')
@section('title')
    {{ __('Sign In') }}
@endsection
@section('content')

    <body
        class="flex items-center justify-center min-h-screen py-16 bg-cover bg-sky-100 dark:bg-auth-pattern-dark dark:text-zink-100 font-public">

    <div class="mb-0 border-none lg:w-[500px] card bg-white/70 shadow-none dark:bg-zink-500/70">
        <div class="!px-10 !py-12 card-body">


            <div class="mt-8 text-center">
                <h4 class="mb-2 text-purple-500 dark:text-purple-500">Bem-vindo !</h4>
                <p class="text-slate-500 dark:text-zink-200">Sistema de estoque.</p>
            </div>

            <form action="{{route('login.autenticar')}}" class="mt-10" method="POST">
                @csrf

                @if(session('message'))
                    <div
                        class="hidden px-4 py-3 mb-3 text-sm text-red-500 border border-red-200 rounded-md bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
                        {{session('message')}}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="username" class="inline-block mb-2 text-base font-medium">Email</label>
                    <input type="text" name="email"
                           class="form-input dark:bg-zink-600/50 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                           placeholder="Enter username or email">
                </div>
                <div class="mb-3">
                    <label for="password" class="inline-block mb-2 text-base font-medium">Senha</label>
                    <input type="password" name="password"
                           class="form-input dark:bg-zink-600/50 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                           placeholder="Enter password">
                </div>

                <div class="mt-10">
                    <button type="submit"
                            class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        Entrar
                    </button>
                </div>


                <div class="mt-10 text-center">
                    <p class="mb-0 text-slate-500 dark:text-zink-200">Não tem uma conta ? <a
                            href="{{ url('register') }}"
                            class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">
                            Criar conta</a></p>
                </div>
            </form>
        </div>
    </div>
    @endsection
    @push('scripts')
        <script src="{{ URL::asset('build/js/pages/auth-login.init.js') }}"></script>
    @endpush
