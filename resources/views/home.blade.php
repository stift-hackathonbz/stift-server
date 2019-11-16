@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-center">
            <div class="max-w-6xl w-full sm:w-full lg:w-full py-6 px-3">
                <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 mb-4" role="alert">
                    <p class="font-bold">Your dashboard</p>
                    <p class="text-sm">All your key metrics.</p>
                </div>
                <div class="flex flex-wrap mb-2">
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5> Total Tools</h5>
                                    <h3 class="text-3xl">20</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5>Tools in VW CADDY (TYP 2K)</h5>
                                    <h3 class="text-3xl">13</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5>Tools in Workshop</h5>
                                    <h3 class="text-3xl">7</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-3 xl:pr-2">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5>Next start</h5>
                                    <h3 class="text-3xl">Monday 8:00 am</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pl-2 xl:pr-3">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5>Last check</h5>
                                    <h3 class="text-3xl">3 minutes ago</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-1">
                        <div class="bg-gray-100 border-t border-gray-300 text-gray-700 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                <div class="flex-1 text-right">
                                    <h5>Wrong place</h5>
                                    <h3 class="text-3xl">3</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
