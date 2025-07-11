  <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <a href="{{ route('companies.invite-admin') }}" class="bg-gray-800 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create Invite</a>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full w-full divide-y divide-gray-200 mt-4 border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Role(s)</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $i = 0;
                    @endphp
                    @forelse($users as $inviter)
                        @php
                        $i++;
                            $user = $inviter->inviter;
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-left text-xs text-gray-900">{{ $i }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-xs text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-xs text-gray-900">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-xs text-gray-900">{{ $user->roles->pluck('name')->join(', ') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-left text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>

         {{-- add dasboard route condition --}}
        @if (request()->routeIs('dashboard'))
        <div>
            <a href="{{ route('companies.invite-list') }}" class=" mt-4 inline-block text-sm text-gray-600 hover:text-gray-900">
                <p>View All</p>
            </a>
        </div>

        @endif
        {{-- end dashboard route condition --}}
    </div>
</div>


