<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Guestbook Admin</h2></x-slot>
<div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
@if(session('success'))<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>@endif

<div class="grid grid-cols-3 gap-4 mb-6">
<div class="bg-white p-6 rounded-lg shadow"><h3 class="text-sm font-medium text-gray-500 mb-2">Pending Review</h3>
<p class="text-3xl font-bold text-orange-600">{{ $stats['pending'] }}</p></div>
<div class="bg-white p-6 rounded-lg shadow"><h3 class="text-sm font-medium text-gray-500 mb-2">Approved</h3>
<p class="text-3xl font-bold text-green-600">{{ $stats['approved'] }}</p></div>
<div class="bg-white p-6 rounded-lg shadow"><h3 class="text-sm font-medium text-gray-500 mb-2">Total Entries</h3>
<p class="text-3xl font-bold text-indigo-600">{{ $stats['total'] }}</p></div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden"><table class="w-full">
<thead class="bg-gray-50 border-b"><tr><th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Name</th>
<th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Message</th>
<th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
<th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Date</th>
<th class="text-right px-6 py-3 text-xs font-medium text-gray-500 uppercase">Actions</th></tr></thead>
<tbody class="divide-y">@foreach($entries as $entry)
<tr><td class="px-6 py-4"><div class="font-medium text-gray-900">{{ $entry->name }}</div>
@if($entry->email)<div class="text-sm text-gray-500">{{ $entry->email }}</div>@endif</td>
<td class="px-6 py-4 max-w-md"><p class="text-gray-700 truncate">{{ Str::limit($entry->message, 100) }}</p></td>
<td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded font-semibold {{ $entry->status === 'approved' ? 'bg-green-100 text-green-800' : ($entry->status === 'pending' ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800') }}">{{ ucfirst($entry->status) }}</span></td>
<td class="px-6 py-4 text-sm text-gray-500">{{ $entry->created_at->format('M d, Y') }}</td>
<td class="px-6 py-4 text-right">
@if($entry->status === 'pending')
<form method="POST" action="{{ route('entries.approve', $entry) }}" class="inline">@csrf
<button type="submit" class="text-green-600 hover:text-green-800 mr-3">✓ Approve</button></form>
<form method="POST" action="{{ route('entries.reject', $entry) }}" class="inline">@csrf
<button type="submit" class="text-red-600 hover:text-red-800 mr-3">✗ Reject</button></form>
@endif
<form method="POST" action="{{ route('entries.destroy', $entry) }}" class="inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
<button type="submit" class="text-gray-600 hover:text-gray-800">Delete</button></form>
</td></tr>@endforeach</tbody></table>
<div class="px-6 py-4">{{ $entries->links() }}</div>
</div></div></div>
</x-app-layout>
