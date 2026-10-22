<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Sign Guestbook</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50"><div class="max-w-2xl mx-auto py-12 px-4">
<nav class="mb-6"><a href="{{ route('guestbook.index') }}" class="text-indigo-600 hover:text-indigo-800">← Back to guestbook</a></nav>
<div class="bg-white rounded-lg shadow p-8"><h1 class="text-3xl font-bold text-gray-900 mb-6">Sign the Guestbook</h1>
<form method="POST" action="{{ route('guestbook.store') }}">@csrf
<div class="mb-4"><label class="block text-sm font-medium mb-2">Name *</label>
<input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
@error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Email (optional)</label>
<input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
@error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Phone (optional)</label>
<input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
@error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<div class="mb-6"><label class="block text-sm font-medium mb-2">Message *</label>
<textarea name="message" rows="6" required class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" placeholder="Share your thoughts...">{{ old('message') }}</textarea>
@error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<p class="text-sm text-gray-600 mb-6">Your message will be reviewed before appearing in the guestbook.</p>
<div class="flex gap-3"><button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">Submit Message</button>
<a href="{{ route('guestbook.index') }}" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Cancel</a></div>
</form></div></div></body></html>
