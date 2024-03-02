<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($users as $user)
                    {{ $user->name }}<br>

                    @endforeach
            <form class="row g-3" action='{{ route('users.search') }}' method='get'>
                @csrf
               
            <div class="col-auto">
                <input type="text" class="form-control" name="name" placeholder="имя пользователя">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">поиск</button>
            </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
