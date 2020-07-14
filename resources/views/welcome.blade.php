<x-layout>
    <x-section>
        <h1>Users</h1>
        <div class="mt-4 w-full flex justify-end">
            <form action="{{ route('welcome') }}" method="GET">
                <div class="flex items-end space-x-2">
                    <div>
                        <label for="industry" class="block text-sm leading-5 font-medium text-gray-700">Select
                            Industry</label>
                        <select id="industry"
                                name="industry"
                                class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}" {{ request()->industry == $industry->id ? 'selected' : '' }}>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span class="inline-flex rounded-md shadow-sm">
                          <button type="submit"
                                  class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Filter
                          </button>
                        </span>
                    </div>
                    <div>
                        <span class="inline-flex rounded-md shadow-sm">
                          <a href="{{ route('welcome') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            Reset
                          </a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-4 flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Job Title
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Industries
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white odd:bg-gray-50">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ $user->job_title }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-xs leading-5 text-gray-500">
                                    @foreach ($user->industries as $industry)
                                        <span class="block">{{ $industry->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </x-section>
</x-layout>
