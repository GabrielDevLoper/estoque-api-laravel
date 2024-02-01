@extends('layouts.master')
@section('title')
    {{ __('List View') }}
@endsection
@push('css')
    <script src="{{ URL::asset('build/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/common.js') }}"></script>
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- page title -->
    <x-page-title title="Tipos Movimentação" pagetitle="Estoque" />

    <div class="card" id="productListTable">
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                <div class="xl:col-span-3">
                    <div class="relative">
                        <input type="text"
                               class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Busque pelo nome" autocomplete="off">
                        <i data-lucide="search"
                           class="inline-block w-4 h-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                    <button data-modal-target="tipoMovimentacaoModal" type="button"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                            data-lucide="plus" class="inline-block w-4 h-4"></i> <span class="align-middle">Novo</span></button>
                </div>
            </div><!--end grid-->
        </div>
        <div class="!pt-1 card-body">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="productTable">
                    <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                    <tr>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code"
                            data-sort="product_code">ID</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name"
                            data-sort="product_name">Nome</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">
                            Ações</th>
                    </tr>
                    </thead>
                    <tbody class="list" >
                    @foreach($tipos_movimentacao as $index => $tipo_movimentacao)
                        <tr>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                {{$tipo_movimentacao->id}}
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                {{$tipo_movimentacao->nome}}
                            </td>

                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                <div class="flex gap-3">
                                    <a class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"
                                       href="{{ url('pages-account') }}"><i data-lucide="eye"
                                                                            class="inline-block w-3 h-3"></i> </a>
                                    <a href="#!" data-modal-target="tipoMovimentacaoModalEdita{{$index}}"
                                       class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md edit-item-btn bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i
                                            data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="#!" data-modal-target="deleteModal{{$index}}"
                                       class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md remove-item-btn bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i
                                            data-lucide="trash-2" class="w-4 h-4"></i></a>
                                </div>
                            </td>
                        </tr>

                        <div id="deleteModal{{$index}}" modal-center
                             class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                            <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                                <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                    <div class="float-right">
                                        <button data-modal-close="deleteModal{{$index}}"
                                                class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                                data-lucide="x" class="w-5 h-5"></i></button>
                                    </div>
                                    <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                                    <div class="mt-5 text-center">
                                        {{ Form::open(['route' => ['tipo.movimentacao.deletar', $tipo_movimentacao->id], 'method' => 'delete']) }}
                                        <h5 class="mb-1">Tem certeza?</h5>
                                        <p class="text-slate-500 dark:text-zink-200">Tem certeza de que deseja excluir este registro?</p>
                                        <div class="flex justify-center gap-2 mt-6">
                                            <button type="reset" data-modal-close="deleteModal{{$index}}"
                                                    class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancelar</button>
                                            <button type="submit"
                                                    class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Sim,
                                                Deletar!</button>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tipoMovimentacaoModalEdita{{$index}}" modal-center
                             class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                            <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                    <h5 class="text-16">Editar Tipo Movimentação</h5>
                                    <button data-modal-close="tipoMovimentacaoModalEdita{{$index}}"
                                            class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                                                                                                                                 class="w-5 h-5"></i></button>
                                </div>
                                <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                    {{ Form::open(['route' => ['tipo.movimentacao.atualizar', $tipo_movimentacao->id], 'method' => 'put']) }}

                                    <div class="mb-3">
                                        <label for="nome" class="inline-block mb-2 text-base font-medium">Nome</label>
                                        <input type="text" id="nome" name="nome" value="{{$tipo_movimentacao->nome}}"
                                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                               placeholder="Insira o nome" required>
                                    </div>

                                    <div class="flex justify-end gap-2 mt-4">
                                        <button type="reset" data-modal-close="tipoMovimentacaoModalEdita{{$index}}"
                                                class="text-red-500 transition-all duration-200 ease-linear bg-white border-white btn hover:text-red-600 focus:text-red-600 active:text-red-600 dark:bg-zink-500 dark:border-zink-500">Cancelar</button>
                                        <button type="submit"
                                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                            Salvar
                                        </button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div><!--end add user-->

                    @endforeach

                    </tbody>
                </table>
                <div class="noresult" style="display: none">
                    <div class="py-6 text-center">
                        <i data-lucide="search"
                           class="w-6 h-6 mx-auto mb-3 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                        <h5 class="mt-2 mb-1">Sorry! No Result Found</h5>
                        <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+ product We did not
                            find any product for you search.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 px-4 mt-4 md:flex-row" id="pagination-element">
                <div class="grow">

                </div>

                <div class="col-sm-auto mt-sm-0">
                    <div class="flex gap-2 pagination-wrap justify-content-center">
                        <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev "
                           href="javascript:void(0)">
                            <i class="w-4 h-4 mr-1 rtl:rotate-180" data-lucide="chevron-left"></i> Prev
                        </a>
                        <ul class="flex flex-wrap items-center gap-2 pagination listjs-pagination">
                        </ul>
                        <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-next"
                           href="javascript:void(0)">
                            Next <i class="w-4 h-4 ml-1 rtl:rotate-180" data-lucide="chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end card-->





    <div id="tipoMovimentacaoModal" modal-center
         class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Adicionar Tipo Movimentação</h5>
                <button data-modal-close="tipoMovimentacaoModal"
                        class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                                                                                                             class="w-5 h-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                {{ Form::open(['route' => 'tipo.movimentacao.salvar', 'method' => 'post']) }}

                    <div class="mb-3">
                        <label for="nome" class="inline-block mb-2 text-base font-medium">Nome</label>
                        <input type="text" id="nome" name="nome"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Insira o nome" required>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" data-modal-close="tipoMovimentacaoModal"
                                class="text-red-500 transition-all duration-200 ease-linear bg-white border-white btn hover:text-red-600 focus:text-red-600 active:text-red-600 dark:bg-zink-500 dark:border-zink-500">Cancelar</button>
                        <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            Salvar
                        </button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div><!--end add user-->
@endsection
@push('scripts')
    <!-- list js-->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/apps-ecommerce-product.init.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!--sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweetalert.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
