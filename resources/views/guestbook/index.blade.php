<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Digital Guestbook</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50"><div class="max-w-4xl mx-auto py-12 px-4">
<header class="mb-12 text-center"><h1 class="text-4xl font-bold text-gray-900 mb-4">Digital Guestbook</h1>
<p class="text-gray-600 mb-6">Share your thoughts and leave a message</p>
<div class="flex gap-4 justify-center"><a href="{{ route('guestbook.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">✍️ Sign Guestbook</a>
@auth<a href="{{ route('entries.index') }}" class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900">Admin Panel</a>@else
<a href="{{ route('login') }}" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Login</a>@endauth</div></header>

@if(session('success'))<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>@endif

<div class="space-y-6">@forelse($entries as $entry)
<div class="bg-white rounded-lg shadow p-6"><div class="flex items-start gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold text-xl">{{ substr($entry->name, 0, 1) }}</div>
<div class="flex-1"><h3 class="font-bold text-gray-900 mb-1">{{ $entry->name }}</h3>
<p class="text-sm text-gray-500 mb-3">{{ $entry->approved_at->format('F d, Y') }}</p>
<p class="text-gray-700 leading-relaxed">{{ $entry->message }}</p></div></div></div>
@empty<div class="text-center py-12 text-gray-500">No entries yet. Be the first to sign the guestbook!</div>@endforelse
<div class="mt-6">{{ $entries->links() }}</div>
</div></div></body></html>
