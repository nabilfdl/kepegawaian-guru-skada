<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Teacher Details</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-bold">NIP:</label>
                        <p class="text-gray-900">{{ $user->nip }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Name:</label>
                        <p class="text-gray-900">{{ $user->name }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Email:</label>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Phone:</label>
                        <p class="text-gray-900">{{ $user->phone }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Address:</label>
                        <p class="text-gray-900">{{ $user->address }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Subject:</label>
                        <p class="text-gray-900">{{ $user->subject->subject_name }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Birth Date:</label>
                        <p class="text-gray-900">{{ $user->birth_date }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Role:</label>
                        <p class="text-gray-900">{{ $user->role }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Sex:</label>
                        <p class="text-gray-900">{{ $user->sex }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Marital Status:</label>
                        <p class="text-gray-900">{{ $user->marital_status }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Status:</label>
                        <p class="text-gray-900">{{ $user->status }}</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('data_guru.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>