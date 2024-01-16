<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(auth()->user()->name.'訂單列表') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ol>
                        @foreach($orders as $order)
                            <li>{{$order->id}}: {{$order->created_at}}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
